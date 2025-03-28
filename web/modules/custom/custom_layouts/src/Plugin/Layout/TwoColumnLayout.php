<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\custom_layouts\Plugin\Layout\CustomLayoutBase;

/**
 * Provides a two-column layout.
 *
 * @Layout(
 *   id = "layout__two_column",
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
class TwoColumnLayout extends CustomLayoutBase {}
