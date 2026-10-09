<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping\Hook;

use Drupal\Core\Hook\Attribute\Hook;

/**
 * Hook implementations for biershop_free_shipping.
 */
final class BiershopFreeShippingHooks {

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
