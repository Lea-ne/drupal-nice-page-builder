<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\Core\Layout\LayoutDefault;

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
}
