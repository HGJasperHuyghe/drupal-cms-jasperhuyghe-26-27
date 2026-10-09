<?php

declare(strict_types=1);

namespace Drupal\biershop_free_shipping\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configures the free shipping threshold.
 */
final class FreeShippingSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'biershop_free_shipping_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['biershop_free_shipping.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('biershop_free_shipping.settings');

    $form['enabled'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable free shipping'),
      '#default_value' => $config->get('enabled'),
    ];
    $form['threshold'] = [
      '#type' => 'commerce_price',
      '#title' => $this->t('Free shipping from'),
      '#description' => $this->t('Order subtotal after discounts, excluding shipping costs.'),
      '#default_value' => $config->get('threshold'),
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    parent::validateForm($form, $form_state);
    $threshold = $form_state->getValue('threshold');
    if (isset($threshold['number']) && (float) $threshold['number'] <= 0) {
      $form_state->setErrorByName('threshold', $this->t('The amount must be greater than zero.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->config('biershop_free_shipping.settings')
      ->set('enabled', (bool) $form_state->getValue('enabled'))
      ->set('threshold', $form_state->getValue('threshold'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
