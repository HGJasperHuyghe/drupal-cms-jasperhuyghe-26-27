<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping\Controller;

use Drupal\biershop_free_shipping\FreeShippingCalculatorInterface;
use Drupal\biershop_free_shipping\FreeShippingLog;
use Drupal\commerce_price\CurrencyFormatter;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Admin overview of orders that received free shipping.
 */
final class FreeShippingReportController extends ControllerBase {

  public function __construct(
    private readonly FreeShippingLog $log,
    private readonly FreeShippingCalculatorInterface $calculator,
    private readonly CurrencyFormatter $currencyFormatter,
    private readonly DateFormatterInterface $dateFormatter,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): self {
    return new self(
      $container->get('biershop_free_shipping.log'),
      $container->get('biershop_free_shipping.calculator'),
      $container->get('commerce_price.currency_formatter'),
      $container->get('date.formatter'),
    );
  }

  /**
   * Builds the report page.
   */
  public function overview(): array {
    $build = [];

    $threshold = $this->calculator->getThreshold();
    $build['status'] = [
      '#type' => 'item',
      '#title' => $this->t('Current threshold'),
      '#markup' => $threshold
        ? $this->currencyFormatter->format($threshold->getNumber(), $threshold->getCurrencyCode())
        : $this->t('Free shipping is disabled.'),
    ];

    $totals = [];
    foreach ($this->log->getTotals() as $row) {
      $totals[] = [
        $row->currency_code,
        $row->orders,
        $this->currencyFormatter->format($row->subtotal, $row->currency_code),
        $this->currencyFormatter->format($row->waived, $row->currency_code),
      ];
    }
    $build['totals'] = [
      '#type' => 'table',
      '#caption' => $this->t('Totals'),
      '#header' => [
        $this->t('Currency'),
        $this->t('Orders'),
        $this->t('Order subtotals'),
        $this->t('Shipping costs waived'),
      ],
      '#rows' => $totals,
      '#empty' => $this->t('No orders with free shipping yet.'),
    ];

    $rows = [];
    foreach ($this->log->getRecent() as $row) {
      $order_url = Url::fromRoute('entity.commerce_order.canonical', ['commerce_order' => $row->order_id]);
      $rows[] = [
        $this->dateFormatter->format((int) $row->created, 'short'),
        Link::fromTextAndUrl('#' . $row->order_id, $order_url),
        $row->uid ? Link::createFromRoute($this->t('User @uid', ['@uid' => $row->uid]), 'entity.user.canonical', ['user' => $row->uid]) : $this->t('Guest'),
        $this->currencyFormatter->format($row->subtotal, $row->currency_code),
        $this->currencyFormatter->format($row->threshold, $row->currency_code),
        $this->currencyFormatter->format($row->shipping_waived, $row->currency_code),
      ];
    }
    $build['orders'] = [
      '#type' => 'table',
      '#caption' => $this->t('Orders'),
      '#header' => [
        $this->t('Placed'),
        $this->t('Order'),
        $this->t('Customer'),
        $this->t('Subtotal'),
        $this->t('Threshold at the time'),
        $this->t('Shipping waived'),
      ],
      '#rows' => $rows,
      '#empty' => $this->t('No orders with free shipping yet.'),
    ];
    $build['pager'] = ['#type' => 'pager'];

    $build['#cache'] = [
      'tags' => ['commerce_order_list', 'config:biershop_free_shipping.settings'],
      'contexts' => ['url.query_args.pagers'],
    ];

    return $build;
  }

}
