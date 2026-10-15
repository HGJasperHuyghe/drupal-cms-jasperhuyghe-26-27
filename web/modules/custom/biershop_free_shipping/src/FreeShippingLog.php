<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping;

use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Database\Query\PagerSelectExtender;

/**
 * Stores and reads placed orders that received free shipping.
 *
 * All access to the biershop_free_shipping_log table goes through this
 * service.
 */
final class FreeShippingLog {

  public const TABLE = 'biershop_free_shipping_log';

  public function __construct(
    private readonly Connection $database,
    private readonly FreeShippingCalculatorInterface $calculator,
    private readonly TimeInterface $time,
  ) {}

  /**
   * Records the order if free shipping was applied to it.
   *
   * @return bool
   *   TRUE if the order was recorded.
   */
  public function recordOrder(OrderInterface $order): bool {
    $waived = NULL;
    foreach ($order->getAdjustments(['shipping_promotion']) as $adjustment) {
      if ($adjustment->getSourceId() !== 'biershop_free_shipping') {
        continue;
      }
      $amount = $adjustment->getAmount()->multiply('-1');
      $waived = $waived ? $waived->add($amount) : $amount;
    }
    $subtotal = $this->calculator->getEligibleSubtotal($order);
    $threshold = $this->calculator->getThreshold();
    if (!$waived || !$subtotal || !$threshold) {
      return FALSE;
    }

    // Merge on order_id, so a re-placed order is never counted twice.
    $this->database->merge(self::TABLE)
      ->key('order_id', (int) $order->id())
      ->fields([
        'uid' => (int) $order->getCustomerId(),
        'subtotal' => $subtotal->getNumber(),
        'shipping_waived' => $waived->getNumber(),
        'threshold' => $threshold->getNumber(),
        'currency_code' => $waived->getCurrencyCode(),
        'created' => $order->getPlacedTime() ?: $this->time->getRequestTime(),
      ])
      ->execute();
    return TRUE;
  }

  /**
   * Removes the record of a deleted order.
   */
  public function deleteOrder(int $order_id): void {
    $this->database->delete(self::TABLE)
      ->condition('order_id', $order_id)
      ->execute();
  }

  /**
   * Gets totals per currency.
   *
   * @return array<int, object{currency_code: string, orders: int, waived: string, subtotal: string}>
   *   One row per currency.
   */
  public function getTotals(): array {
    $query = $this->database->select(self::TABLE, 'l');
    $query->addField('l', 'currency_code');
    $query->addExpression('COUNT(l.id)', 'orders');
    $query->addExpression('SUM(l.shipping_waived)', 'waived');
    $query->addExpression('SUM(l.subtotal)', 'subtotal');
    $query->groupBy('l.currency_code');
    return $query->execute()->fetchAll();
  }

  /**
   * Gets the most recent records, paged.
   *
   * @return object[]
   *   Log rows, newest first.
   */
  public function getRecent(int $limit = 25): array {
    /** @var \Drupal\Core\Database\Query\PagerSelectExtender $query */
    $query = $this->database->select(self::TABLE, 'l')
      ->extend(PagerSelectExtender::class);
    return $query->fields('l')
      ->orderBy('l.created', 'DESC')
      ->orderBy('l.id', 'DESC')
      ->limit($limit)
      ->execute()
      ->fetchAll();
  }

}
