<?php

namespace Drupal\biershop_search\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Points the public help-search path to the product catalog search.
 */
final class BiershopSearchRouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection): void {
    $route = $collection->get('search.view_help_search');

    if ($route) {
      $route->setDefault('_controller', '\\Drupal\\biershop_search\\Controller\\BiershopSearchController::redirectToCatalog');
      $route->setRequirements(['_access' => 'TRUE']);
    }
  }
}
