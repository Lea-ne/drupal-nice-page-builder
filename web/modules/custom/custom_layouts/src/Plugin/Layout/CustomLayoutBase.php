<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Form\FormStateInterface;

/**
 * Base class for custom layouts.
 */
abstract class CustomLayoutBase extends LayoutDefault {
  /**
   * Gets the CSS class for the layout.
   */
  public function getLayoutClass() {
    return str_replace('_', '-', $this->getPluginId());
  }


  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'extra_classes' => 'e',
      'background_color' => 'red',
      'use_container' => 'yes',
      'spacing_top' => 'small',
      'spacing_bottom' => 'small',
    ];
  }



  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $configuration = $this->getConfiguration();

    $form['background_color'] = [
      '#type' => 'select',
      '#title' => $this->t('Column width'),
      '#options' => [
          'red' => 'Red',
          'green' => 'green',
          'blue' => 'blue',
      ],
      '#default_value' => $configuration['background_color'],
      '#description' => $this->t('Sélectionnez le couleur de fond.'),
    ];

    $form['use_container'] = [
      '#type' => 'Select',
      '#title' => $this->t('Use container'),
      '#options' => [
          'yes' => 'Yes',
          'no' => 'No',
      ],
      '#default_value' => $configuration['use_container'],
      '#description' => $this->t('Utiliser un container pour le layout.'),
    ];

    $form['spacing_top'] = [
      '#type' => 'select',
      '#title' => $this->t('spacing top'),
      '#options' => [
          'small' => 'Small',
          'medium' => 'Medium',
          'large' => 'Large',
      ],
      '#default_value' => $configuration['spacing_top'],
      '#description' => $this->t('Espace en haut du layout.'),
    ];

    $form['spacing_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('spacing bottom'),
      '#options' => [
          'small' => 'Small',
          'medium' => 'Medium',
          'large' => 'Large',
      ],
      '#default_value' => $configuration['spacing_bottom'],
      '#description' => $this->t('Espace en bas du layout.'),
    ];

    
    return $form;
  }


  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['background_color'] = $form_state->getValue('background_color');
   
  }


  public function build(array $regions) {
    $build = parent::build($regions);
  
    // Ajouter chaque attribut indépendamment
    $build['#attributes']['background_color'] = $this->configuration['background_color'];
    $build['#attributes']['use_container'] = $this->configuration['use_container'];
    $build['#attributes']['spacing_top'] = $this->configuration['spacing_top'];
    $build['#attributes']['spacing_bottom'] = $this->configuration['spacing_bottom'];
  
    return $build;
  }
  

}
