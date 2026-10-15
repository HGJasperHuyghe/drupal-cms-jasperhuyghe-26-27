<?php

declare(strict_types=1);

namespace Drupal\biershop_cart\EventSubscriber;

use Drupal\commerce_cart\Event\CartEntityAddEvent;
use Drupal\commerce_cart\Event\CartEvents;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Url;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Confirms added products with a link to the cart.
 */
final class CartSubscriber implements EventSubscriberInterface {

  use StringTranslationTrait;

  public function __construct(
    private readonly MessengerInterface $messenger,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      CartEvents::CART_ENTITY_ADD => 'onCartEntityAdd',
    ];
  }

  /**
   * Shows the confirmation message.
   */
  public function onCartEntityAdd(CartEntityAddEvent $event): void {
    $this->messenger->addStatus($this->t('<strong>@quantity × @product</strong> zit in je winkelmandje. <a href=":url">Bekijk je winkelmandje</a>', [
      '@quantity' => (float) $event->getQuantity(),
      '@product' => $event->getEntity()->label(),
      ':url' => Url::fromRoute('commerce_cart.page')->toString(),
    ]));
  }

}
