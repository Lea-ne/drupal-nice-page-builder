<?php

namespace Drupal\commerce_product\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\Routing\Route;

/**
 * Defines an access checker for the product variation collection route.
 *
 * Takes the product variation type ID from the product type, since a product
 * is always present in variation routes.
 */
class ProductVariationCollectionAccessCheck implements AccessInterface {

  /**
   * Constructs a new ProductVariationCollectionAccessCheck object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   */
  public function __construct(protected EntityTypeManagerInterface $entityTypeManager) {}

  /**
   * Checks access to the product variation collection.
   *
   * @param \Symfony\Component\Routing\Route $route
   *   The route to check against.
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The route match.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The currently logged in account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(Route $route, RouteMatchInterface $route_match, AccountInterface $account) {
    /** @var \Drupal\commerce_product\Entity\ProductInterface $product */
    $product = $route_match->getParameter('commerce_product');
    $product_type_storage = $this->entityTypeManager->getStorage('commerce_product_type');

    if (!$product) {
      return AccessResult::forbidden();
    }

    /** @var \Drupal\commerce_product\Entity\ProductTypeInterface $product_type */
    $product_type = $product_type_storage->load($product->bundle());
    if (!$product_type) {
      return AccessResult::forbidden();
    }

    if (!$product_type->allowsMultipleVariations()) {
      // Product types that don't allow multiple variations do not need
      // a product variation collection route.
      return AccessResult::forbidden()->addCacheableDependency($product_type);
    }

    $variation_type_ids = $product_type->getVariationTypeIds();
    // The collection route can be accessed by users with the administer
    // or manage permissions, because those permissions grant full access
    // to variations (add/edit/delete). The route can also be accessed by
    // users with the "access overview" permission, allowing both product and
    // variation listings to be viewed even if no other operations are allowed.
    $permissions = [
      'administer commerce_product',
      'access commerce_product overview',
    ];
    foreach ($variation_type_ids as $variation_type_id) {
      $permissions[] = "manage $variation_type_id commerce_product_variation";
    }

    return AccessResult::allowedIfHasPermissions($account, $permissions, 'OR');
  }

}
