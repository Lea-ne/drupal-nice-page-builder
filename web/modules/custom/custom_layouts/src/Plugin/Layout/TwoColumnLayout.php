<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\custom_layouts\Plugin\Layout\CustomLayoutBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a two-column layout.
 *
 * @Layout(
 *   id = "layout--two-column",
 *   label = @Translation("Two Columns"),
 *   category = @Translation("Custom"),
 *   path = "layouts",
 *   template = "custom-layout",
 *   library = "custom_layouts/layout_style",
 *   class = "custom-five-column-layout",
 *   default_region = "col1",
 *   regions = {
 *     "col1" = {
 *       "label" = @Translation("Colonne 1")
 *     },
 *     "col2" = {
 *       "label" = @Translation("Colonne 2")
 *     },
 *   }
 * )
 */
class TwoColumnLayout extends CustomLayoutBase {

   /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'extra_classes' => 'Default',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $configuration = $this->getConfiguration();
    $form['extra_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Extra classes'),
      '#default_value' => $configuration['extra_classes'],
    ];


    $form['column_width'] = [
        '#type' => 'select',
        '#title' => $this->t('Column width'),
        '#options' => [
          '5050' => '50% | 50%',
          '7525' => '75% | 25%',
          '2575' => '25% | 75%',
        ],
        '#default_value' => $configuration['column_width'],
        '#description' => $this->t('Sélectionnez la largeur que les colones doivent occupés.'),
      ];

    
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
    // any additional form validation that is required
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['extra_classes'] = $form_state->getValue('extra_classes');
  }

}
