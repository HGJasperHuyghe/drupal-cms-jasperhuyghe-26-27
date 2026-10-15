<?php

declare(strict_types=1);

namespace Drupal\biershop_account\Hook;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\Core\Hook\Attribute\Hook;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Url;
use Drupal\user\UserInterface;
use Drupal\views\Views;

/**
 * Hook implementations for biershop_account.
 */
final class BiershopAccountHooks {

  use StringTranslationTrait;

  /**
   * Number of orders shown on the account overview.
   */
  private const RECENT_ORDERS = 3;

  public function __construct(
    private readonly AccountInterface $currentUser,
    private readonly RouteMatchInterface $routeMatch,
  ) {}

  /**
   * Implements hook_entity_extra_field_info().
   */
  #[Hook('entity_extra_field_info')]
  public function entityExtraFieldInfo(): array {
    $extra['user']['user']['display']['account_overzicht'] = [
      'label' => $this->t('Account overview'),
      'description' => $this->t('Recent orders and a link to change e-mail and password. Only shown on your own account.'),
      'weight' => -10,
      'visible' => FALSE,
    ];
    return $extra;
  }

  /**
   * Implements hook_ENTITY_TYPE_view() for user.
   */
  #[Hook('user_view')]
  public function userView(array &$build, UserInterface $account, EntityViewDisplayInterface $display, string $view_mode): void {
    if (!$display->getComponent('account_overzicht')) {
      return;
    }

    $cacheability = (new CacheableMetadata())
      ->addCacheContexts(['user', 'route'])
      ->addCacheableDependency($account);

    // Users are also rendered elsewhere, e.g. as the author of a blog post in
    // the "compact" view mode, which falls back to the default display. Only
    // show the overview on the account page itself, and only to its owner.
    $route_user = $this->routeMatch->getParameter('user');
    $is_account_page = $view_mode === 'full'
      && $this->routeMatch->getRouteName() === 'entity.user.canonical'
      && $route_user instanceof UserInterface
      && (int) $route_user->id() === (int) $account->id();
    if (!$is_account_page || (int) $this->currentUser->id() !== (int) $account->id()) {
      CacheableMetadata::createFromRenderArray($build)->merge($cacheability)->applyTo($build);
      return;
    }

    $orders_url = Url::fromRoute('view.commerce_user_orders.order_page', ['user' => $account->id()]);
    $edit_url = $account->toUrl('edit-form');

    $orders = [
      '#type' => 'container',
      '#attributes' => ['class' => ['account-overzicht__kaart']],
      'title' => ['#markup' => '<h2>' . $this->t('Mijn bestellingen') . '</h2>'],
    ];
    $view = Views::getView('commerce_user_orders');
    if ($view && $view->access('order_page') && $orders_url->access()) {
      // Show only the latest orders without a pager; the full list has its
      // own page.
      $view->setDisplay('order_page');
      $view->display_handler->setOption('pager', [
        'type' => 'some',
        'options' => ['items_per_page' => self::RECENT_ORDERS, 'offset' => 0],
      ]);
      $orders['list'] = $view->preview('order_page', [$account->id()]);
      $orders['link'] = [
        '#type' => 'link',
        '#title' => $this->t('Alle bestellingen bekijken'),
        '#url' => $orders_url,
        '#attributes' => ['class' => ['account-overzicht__link']],
      ];
    }
    else {
      $orders['empty'] = ['#markup' => '<p>' . $this->t('Je bestellingen zijn niet beschikbaar.') . '</p>'];
    }

    $details = [
      '#type' => 'container',
      '#attributes' => ['class' => ['account-overzicht__kaart']],
      'title' => ['#markup' => '<h2>' . $this->t('Gegevens en wachtwoord') . '</h2>'],
      'text' => [
        '#markup' => '<p>' . $this->t('Wijzig je e-mailadres of wachtwoord. Je hebt daarvoor je huidige wachtwoord nodig.') . '</p>',
      ],
      'link' => [
        '#type' => 'link',
        '#title' => $this->t('Gegevens en wachtwoord wijzigen'),
        '#url' => $edit_url,
        '#attributes' => ['class' => ['account-overzicht__link']],
        '#access' => $edit_url->access(),
      ],
    ];

    $build['account_overzicht'] = [
      '#type' => 'container',
      '#attributes' => ['class' => ['account-overzicht']],
      '#weight' => $display->getComponent('account_overzicht')['weight'] ?? -10,
      '#attached' => ['library' => ['biershop_account/account']],
      'orders' => $orders,
      'details' => $details,
    ];
    // Merge with the entity's own cache metadata instead of replacing it.
    CacheableMetadata::createFromRenderArray($build)
      ->merge($cacheability->addCacheTags(['commerce_order_list']))
      ->applyTo($build);
  }

  /**
   * Implements hook_menu_local_tasks_alter().
   *
   * Gives the account tabs clear Dutch labels.
   */
  #[Hook('menu_local_tasks_alter')]
  public function menuLocalTasksAlter(array &$data, string $route_name): void {
    $labels = [
      'entity.user.canonical' => $this->t('Overzicht'),
      'views_view:view.commerce_user_orders.order_page' => $this->t('Bestellingen'),
      'entity.user.edit_form' => $this->t('Gegevens & wachtwoord'),
    ];
    foreach ($data['tabs'][0] ?? [] as $id => $tab) {
      if (isset($labels[$id])) {
        $data['tabs'][0][$id]['#link']['title'] = $labels[$id];
      }
    }
  }

  /**
   * Implements hook_menu_links_discovered_alter().
   */
  #[Hook('menu_links_discovered_alter')]
  public function menuLinksDiscoveredAlter(array &$links): void {
    if (isset($links['user.page'])) {
      $links['user.page']['title'] = 'Mijn account';
    }
  }

}
