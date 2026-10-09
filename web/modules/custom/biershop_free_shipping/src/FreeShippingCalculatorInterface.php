<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping;

use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_price\Price;

/**
 * Decides whether an order qualifies for free shipping.
 *
 * Both the order processor and the progress block use this service, so the
 * customer-facing message always matches the shipping cost that is charged.
 */
interface FreeShippingCalculatorInterface {

  /**
   * Gets the configured threshold, or NULL when free shipping is disabled.
   */
  public function getThreshold(): ?Price;

  /**
   * Gets the order subtotal that counts towards the threshold.
   *
   * This is the sum of the order items after promotions, without shipping
   * costs, so a coupon can't push an order over the threshold artificially.
   */
  public function getEligibleSubtotal(OrderInterface $order): ?Price;

  /**
   * Gets the amount still needed to reach free shipping.
   *
   * @return \Drupal\commerce_price\Price|null
   *   The remaining amount (zero once the order qualifies), or NULL when free
   *   shipping does not apply to this order.
   */
  public function getRemaining(OrderInterface $order): ?Price;

  /**
   * Checks whether the order qualifies for free shipping.
   */
  public function qualifies(OrderInterface $order): bool;

}
