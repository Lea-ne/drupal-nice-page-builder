<?php

namespace Drupal\Tests\commerce_order\Kernel;

use Drupal\Core\Routing\RouteObjectInterface;
use Drupal\commerce_order\Entity\Order;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

/**
 * Tests the order store resolver.
 *
 * @group commerce
 */
class OrderStoreResolverTest extends OrderKernelTestBase {

  /**
   * A sample order.
   *
   * @var \Drupal\commerce_order\Entity\OrderInterface
   */
  protected $order;

  /**
   * The second store.
   *
   * @var \Drupal\commerce_store\Entity\StoreInterface
   */
  protected $store2;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->store2 = $this->createStore('Second store', 'admin2@example.com', 'online', FALSE);
    $user = $this->createUser();
    /** @var \Drupal\commerce_order\Entity\Order $order */
    $order = Order::create([
      'type' => 'default',
      'state' => 'draft',
      'mail' => $user->getEmail(),
      'uid' => $user->id(),
      'ip_address' => '127.0.0.1',
      'order_number' => '6',
      'store_id' => $this->store2->id(),
    ]);
    $order->save();
    $this->order = $this->reloadEntity($order);
  }

  /**
   * Tests the order store resolver.
   */
  public function testOrderStoreResolver() {
    $chain_store_resolver = $this->container->get('commerce_store.chain_store_resolver');

    $this->assertEquals($this->store->id(), $chain_store_resolver->resolve()->id());

    $order_canonical_url = $this->order->toUrl();
    $route_provider = $this->container->get('router.route_provider');
    $route = $route_provider->getRouteByName($order_canonical_url->getRouteName());
    $request = Request::create($order_canonical_url->toString());
    $request->setSession(new Session(new MockArraySessionStorage()));
    $request->attributes->add([
      RouteObjectInterface::ROUTE_NAME => $order_canonical_url->getRouteName(),
      RouteObjectInterface::ROUTE_OBJECT => $route,
      'commerce_order' => $this->order,
    ]);
    $this->container->get('request_stack')->push($request);
    $this->assertEquals($this->store2->id(), $chain_store_resolver->resolve()->id());
  }

}
