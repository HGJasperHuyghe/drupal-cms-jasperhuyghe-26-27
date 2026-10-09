<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping\OrderProcessor;

use Drupal\biershop_free_shipping\FreeShippingCalculatorInterface;
use Drupal\commerce_order\Adjustment;
use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_order\OrderProcessorInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Discounts the shipping costs of qualifying orders to zero.
 *
 * The shipping rate itself stays a plain flat rate: commerce_shipping only
 * recalculates rates when order items are added or removed (not on quantity
 * changes) and before promotions are applied. Applying the discount as an
 * adjustment on every order refresh keeps it correct in all those cases.
 */
final class FreeShippingOrderProcessor implements OrderProcessorInterface {

  use StringTranslationTrait;

  public function __construct(
    private readonly FreeShippingCalculatorInterface $calculator,
  ) {}

  /**
   * {@inheritdoc}
   */
  public function process(OrderInterface $order): void {
    if (!$order->hasField('shipments') || $order->get('shipments')->isEmpty()) {
      return;
    }
    if (!$this->calculator->qualifies($order)) {
      return;
    }

    /** @var \Drupal\commerce_shipping\Entity\ShipmentInterface $shipment */
    foreach ($order->get('shipments')->referencedEntities() as $shipment) {
      // Take other shipping promotions (e.g. a coupon) into account, so the
      // shipping costs never become negative.
      $remaining = $shipment->getAdjustedAmount(['shipping_promotion']);
      if (!$remaining || !$remaining->isPositive()) {
        continue;
      }
      $shipment->addAdjustment(new Adjustment([
        'type' => 'shipping_promotion',
        'label' => $this->t('Gratis levering'),
        'amount' => $remaining->multiply('-1'),
        'source_id' => 'biershop_free_shipping',
      ]));
    }
  }

}
