<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping\Hook;

use Drupal\biershop_free_shipping\FreeShippingLog;
use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\Core\Hook\Attribute\Hook;

/**
 * Hook implementations for biershop_free_shipping.
 */
final class BiershopFreeShippingHooks {

  public function __construct(
    private readonly FreeShippingLog $log,
  ) {}

  /**
   * Implements hook_ENTITY_TYPE_delete() for commerce_order.
   *
   * Keeps the log in sync when an order is deleted.
   */
  #[Hook('commerce_order_delete')]
  public function orderDelete(OrderInterface $order): void {
    $this->log->deleteOrder((int) $order->id());
  }

  /**
   * Implements hook_theme().
   */
  #[Hook('theme')]
  public function theme(): array {
    return [
      'biershop_free_shipping_progress' => [
        'variables' => [
          'qualifies' => FALSE,
          'remaining' => NULL,
          'threshold' => NULL,
          'percent' => 0,
        ],
      ],
    ];
  }

}
