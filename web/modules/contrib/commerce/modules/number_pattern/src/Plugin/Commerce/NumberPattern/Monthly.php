<?php

namespace Drupal\commerce_number_pattern\Plugin\Commerce\NumberPattern;

use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\commerce_number_pattern\Attribute\CommerceNumberPattern;
use Drupal\commerce_number_pattern\Sequence;

/**
 * Provides the monthly number pattern.
 */
#[CommerceNumberPattern(
  id: "monthly",
  label: new TranslatableMarkup("Monthly (Reset every month)"),
)]
class Monthly extends SequentialNumberPatternBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'pattern' => '[pattern:year]-[pattern:month]-[pattern:number]',
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  protected function shouldReset(Sequence $current_sequence) {
    // Reset the sequence if the current one is from a previous month.
    $generated_time = DrupalDateTime::createFromTimestamp($current_sequence->getGeneratedTime());
    $current_time = DrupalDateTime::createFromTimestamp($this->time->getCurrentTime());

    return $generated_time->format('Y-m') != $current_time->format('Y-m');
  }

}
