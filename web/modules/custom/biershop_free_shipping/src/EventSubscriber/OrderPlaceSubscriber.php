<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping\EventSubscriber;

use Drupal\biershop_free_shipping\FreeShippingLog;
use Drupal\state_machine\Event\WorkflowTransitionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Logs placed orders that received free shipping.
 */
final class OrderPlaceSubscriber implements EventSubscriberInterface {

  public function __construct(
    private readonly FreeShippingLog $log,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      'commerce_order.place.post_transition' => 'onPlace',
    ];
  }

  /**
   * Records the order when it is placed.
   */
  public function onPlace(WorkflowTransitionEvent $event): void {
    /** @var \Drupal\commerce_order\Entity\OrderInterface $order */
    $order = $event->getEntity();
    $this->log->recordOrder($order);
  }

}
