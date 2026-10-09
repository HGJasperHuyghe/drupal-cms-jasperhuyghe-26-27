<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping;

use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_price\Price;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Default free shipping calculator.
 */
final class FreeShippingCalculator implements FreeShippingCalculatorInterface {

  public function __construct(
    private readonly ConfigFactoryInterface $configFactory,
  ) {}

  /**
   * {@inheritdoc}
   */
  public function getThreshold(): ?Price {
    $config = $this->configFactory->get('biershop_free_shipping.settings');
    $threshold = $config->get('threshold');
    if (!$config->get('enabled') || empty($threshold['number']) || empty($threshold['currency_code'])) {
      return NULL;
    }
    return Price::fromArray($threshold);
  }

  /**
   * {@inheritdoc}
   */
  public function getEligibleSubtotal(OrderInterface $order): ?Price {
    $subtotal = NULL;
    foreach ($order->getItems() as $order_item) {
      $item_total = $order_item->getAdjustedTotalPrice(['promotion']);
      if ($item_total) {
        $subtotal = $subtotal ? $subtotal->add($item_total) : $item_total;
      }
    }
    // Order-level promotions that were not split across the order items.
    foreach ($order->getAdjustments(['promotion']) as $adjustment) {
      if ($subtotal) {
        $subtotal = $subtotal->add($adjustment->getAmount());
      }
    }
    return $subtotal;
  }

  /**
   * {@inheritdoc}
   */
  public function getRemaining(OrderInterface $order): ?Price {
    $threshold = $this->getThreshold();
    if (!$threshold) {
      return NULL;
    }
    $subtotal = $this->getEligibleSubtotal($order) ?? new Price('0', $threshold->getCurrencyCode());
    if ($subtotal->getCurrencyCode() !== $threshold->getCurrencyCode()) {
      return NULL;
    }
    $remaining = $threshold->subtract($subtotal);
    return $remaining->isPositive() ? $remaining : new Price('0', $threshold->getCurrencyCode());
  }

  /**
   * {@inheritdoc}
   */
  public function qualifies(OrderInterface $order): bool {
    $remaining = $this->getRemaining($order);
    return $remaining !== NULL && $remaining->isZero() && $order->getItems();
  }

}
