<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping\Plugin\Block;

use Drupal\biershop_free_shipping\FreeShippingCalculatorInterface;
use Drupal\commerce_cart\CartProviderInterface;
use Drupal\commerce_price\CurrencyFormatter;
use Drupal\commerce_store\CurrentStoreInterface;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Shows how far the current cart is from free shipping.
 */
#[Block(
  id: 'biershop_free_shipping_progress',
  admin_label: new TranslatableMarkup('Free shipping progress'),
  category: new TranslatableMarkup('Commerce'),
)]
final class FreeShippingProgressBlock extends BlockBase implements ContainerFactoryPluginInterface {

  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    private readonly CartProviderInterface $cartProvider,
    private readonly CurrentStoreInterface $currentStore,
    private readonly FreeShippingCalculatorInterface $calculator,
    private readonly CurrencyFormatter $currencyFormatter,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): self {
    return new self(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('commerce_cart.cart_provider'),
      $container->get('commerce_store.current_store'),
      $container->get('biershop_free_shipping.calculator'),
      $container->get('commerce_price.currency_formatter'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $cacheability = new CacheableMetadata();
    $build = [];

    $cart = $this->cartProvider->getCart('default', $this->currentStore->getStore());
    if ($cart) {
      $cacheability->addCacheableDependency($cart);
    }

    $threshold = $this->calculator->getThreshold();
    $remaining = $cart && $cart->hasItems() ? $this->calculator->getRemaining($cart) : NULL;

    if ($threshold && $remaining) {
      $subtotal = $threshold->subtract($remaining);
      $percent = (int) floor(min(100, max(0, (float) $subtotal->divide($threshold->getNumber())->getNumber() * 100)));

      $build = [
        '#theme' => 'biershop_free_shipping_progress',
        '#qualifies' => $remaining->isZero(),
        '#remaining' => $this->currencyFormatter->format($remaining->getNumber(), $remaining->getCurrencyCode()),
        '#threshold' => $this->currencyFormatter->format($threshold->getNumber(), $threshold->getCurrencyCode()),
        '#percent' => $percent,
        '#attached' => ['library' => ['biershop_free_shipping/progress']],
      ];
    }

    $cacheability->applyTo($build);
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts(): array {
    return Cache::mergeContexts(parent::getCacheContexts(), ['cart', 'store']);
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags(): array {
    return Cache::mergeTags(parent::getCacheTags(), ['config:biershop_free_shipping.settings']);
  }

}
