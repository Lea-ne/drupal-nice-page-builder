<?php

namespace Drupal\commerce_payment\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityMalformedException;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\commerce_price\Price;

/**
 * Defines the payment entity class.
 *
 * @ContentEntityType(
 *   id = "commerce_payment",
 *   label = @Translation("Payment"),
 *   label_collection = @Translation("Payments"),
 *   label_singular = @Translation("payment"),
 *   label_plural = @Translation("payments"),
 *   label_count = @PluralTranslation(
 *     singular = "@count payment",
 *     plural = "@count payments",
 *   ),
 *   bundle_label = @Translation("Payment type"),
 *   bundle_plugin_type = "commerce_payment_type",
 *   handlers = {
 *     "access" = "Drupal\commerce_payment\PaymentAccessControlHandler",
 *     "event" = "Drupal\commerce_payment\Event\PaymentEvent",
 *     "list_builder" = "Drupal\commerce_payment\PaymentListBuilder",
 *     "storage" = "Drupal\commerce_payment\PaymentStorage",
 *     "storage_schema" = "Drupal\commerce\CommerceContentEntityStorageSchema",
 *     "form" = {
 *       "operation" = "Drupal\commerce_payment\Form\PaymentOperationForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "views_data" = "Drupal\commerce\CommerceEntityViewsData",
 *     "route_provider" = {
 *       "default" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "commerce_payment",
 *   admin_permission = "administer commerce_payment",
 *   field_indexes = {
 *     "remote_id"
 *   },
 *   entity_keys = {
 *     "id" = "payment_id",
 *     "bundle" = "type",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "collection" = "/admin/commerce/orders/{commerce_order}/payments",
 *     "edit-form" = "/admin/commerce/orders/{commerce_order}/payments/commerce_payment/edit",
 *     "delete-form" = "/admin/commerce/orders/{commerce_order}/payments/{commerce_payment}/delete",
 *   },
 * )
 */
class Payment extends ContentEntityBase implements PaymentInterface {

  /**
   * {@inheritdoc}
   */
  protected function urlRouteParameters($rel) {
    $uri_route_parameters = parent::urlRouteParameters($rel);
    $uri_route_parameters['commerce_order'] = $this->getOrderId();
    return $uri_route_parameters;
  }

  /**
   * {@inheritdoc}
   */
  public function label() {
    // UIs should use the number formatter to show a more user-readable version.
    return $this->getAmount()->__toString();
  }

  /**
   * {@inheritdoc}
   */
  public function getType() {
    $payment_type_manager = \Drupal::service('plugin.manager.commerce_payment_type');
    return $payment_type_manager->createInstance($this->bundle());
  }

  /**
   * {@inheritdoc}
   */
  public function getPaymentGateway() {
    return $this->get('payment_gateway')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getPaymentGatewayId() {
    return $this->get('payment_gateway')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function getPaymentGatewayMode() {
    return $this->get('payment_gateway_mode')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getPaymentMethod() {
    return $this->get('payment_method')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getPaymentMethodId() {
    return $this->get('payment_method')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function getOrder() {
    return $this->get('order_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOrderId() {
    return $this->get('order_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function getRemoteId() {
    return $this->get('remote_id')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setRemoteId($remote_id) {
    $this->set('remote_id', $remote_id);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getRemoteState() {
    return $this->get('remote_state')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setRemoteState($remote_state) {
    $this->set('remote_state', $remote_state);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAvsResponseCode() {
    return $this->get('avs_response_code')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setAvsResponseCode($avs_response_code) {
    $this->set('avs_response_code', $avs_response_code);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAvsResponseCodeLabel() {
    return $this->get('avs_response_code_label')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setAvsResponseCodeLabel($avs_response_code_label) {
    $this->set('avs_response_code_label', $avs_response_code_label);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getBalance() {
    if ($amount = $this->getAmount()) {
      $balance = $amount;
      if ($refunded_amount = $this->getRefundedAmount()) {
        $balance = $balance->subtract($refunded_amount);
      }
      return $balance;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getAmount() {
    if (!$this->get('amount')->isEmpty()) {
      return $this->get('amount')->first()->toPrice();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function setAmount(Price $amount) {
    $this->set('amount', $amount);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getRefundedAmount() {
    if (!$this->get('refunded_amount')->isEmpty()) {
      return $this->get('refunded_amount')->first()->toPrice();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function setRefundedAmount(Price $refunded_amount) {
    $this->set('refunded_amount', $refunded_amount);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getState() {
    return $this->get('state')->first();
  }

  /**
   * {@inheritdoc}
   */
  public function setState($state_id) {
    $this->set('state', $state_id);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthorizedTime() {
    return $this->get('authorized')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setAuthorizedTime($timestamp) {
    $this->set('authorized', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isExpired() {
    $expires = $this->getExpiresTime();
    return $expires > 0 && $expires <= \Drupal::time()->getRequestTime();
  }

  /**
   * {@inheritdoc}
   */
  public function getExpiresTime() {
    return $this->get('expires')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setExpiresTime($timestamp) {
    $this->set('expires', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isCompleted() {
    return !$this->get('completed')->isEmpty();
  }

  /**
   * {@inheritdoc}
   */
  public function getCompletedTime() {
    return $this->get('completed')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCompletedTime($timestamp) {
    $this->set('completed', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function preSave(EntityStorageInterface $storage) {
    parent::preSave($storage);

    $payment_gateway = $this->getPaymentGateway();
    if (!$payment_gateway) {
      throw new EntityMalformedException(sprintf('Required payment field "payment_gateway" is empty.'));
    }
    // Populate the payment_gateway_mode automatically.
    if ($this->get('payment_gateway_mode')->isEmpty()) {
      $this->set('payment_gateway_mode', $payment_gateway->getPlugin()->getMode());
    }
    // Initialize the refunded amount.
    $refunded_amount = $this->getRefundedAmount();
    if (!$refunded_amount) {
      $refunded_amount = new Price('0', $this->getAmount()->getCurrencyCode());
      $this->setRefundedAmount($refunded_amount);
    }
    // Maintain the authorized and completed timestamps.
    $state = $this->getState()->getId();
    $original_state = isset($this->original) ? $this->original->getState()->getId() : '';
    if ($state == 'authorization' && $original_state != 'authorization') {
      if (empty($this->getAuthorizedTime())) {
        $this->setAuthorizedTime(\Drupal::time()->getRequestTime());
      }
    }
    if ($state == 'completed' && $original_state != 'completed') {
      if (empty($this->getCompletedTime())) {
        $this->setCompletedTime(\Drupal::time()->getRequestTime());
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function postSave(EntityStorageInterface $storage, $update = TRUE) {
    parent::postSave($storage, $update);

    $order = $this->getOrder();
    if ($order && $this->isCompleted()) {
      $payment_order_updater = \Drupal::service('commerce_payment.order_updater');
      $payment_order_updater->requestUpdate($order);
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function postDelete(EntityStorageInterface $storage, array $entities) {
    parent::postDelete($storage, $entities);

    $payment_order_updater = \Drupal::service('commerce_payment.order_updater');
    foreach ($entities as $entity) {
      if ($order = $entity->getOrder()) {
        $payment_order_updater->requestUpdate($order);
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['payment_gateway'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Payment gateway'))
      ->setDescription(t('The payment gateway.'))
      ->setRequired(TRUE)
      ->setSetting('target_type', 'commerce_payment_gateway');

    $fields['payment_gateway_mode'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Payment gateway mode'))
      ->setDescription(t('The payment gateway mode.'))
      ->setRequired(TRUE);

    $fields['payment_method'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Payment method'))
      ->setDescription(t('The payment method.'))
      ->setSetting('target_type', 'commerce_payment_method')
      ->setReadOnly(TRUE);

    $fields['order_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Order'))
      ->setDescription(t('The parent order.'))
      ->setSetting('target_type', 'commerce_order')
      ->setReadOnly(TRUE);

    $fields['remote_id'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Remote ID'))
      ->setDescription(t('The remote payment ID.'))
      ->setSetting('max_length', 255)
      ->setDisplayConfigurable('view', TRUE);

    $fields['remote_state'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Remote State'))
      ->setDescription(t('The remote payment state.'))
      ->setSetting('max_length', 255)
      ->setDisplayConfigurable('view', TRUE);

    $fields['amount'] = BaseFieldDefinition::create('commerce_price')
      ->setLabel(t('Amount'))
      ->setDescription(t('The payment amount.'))
      ->setRequired(TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['refunded_amount'] = BaseFieldDefinition::create('commerce_price')
      ->setLabel(t('Refunded amount'))
      ->setDescription(t('The refunded payment amount.'))
      ->setDisplayConfigurable('view', TRUE);

    $fields['state'] = BaseFieldDefinition::create('state')
      ->setLabel(t('State'))
      ->setDescription(t('The payment state.'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'list_default',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('view', TRUE)
      ->setSetting('workflow_callback', ['\Drupal\commerce_payment\Entity\Payment', 'getWorkflowId']);

    $fields['authorized'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Authorized'))
      ->setDescription(t('The time when the payment was authorized.'))
      ->setDisplayConfigurable('view', TRUE);

    $fields['expires'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Expires'))
      ->setDescription(t('The time when the payment expires. 0 for never.'))
      ->setDisplayConfigurable('view', TRUE)
      ->setDefaultValue(0);

    $fields['completed'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Completed'))
      ->setDescription(t('The time when the payment was completed.'))
      ->setDisplayConfigurable('view', TRUE);

    $fields['avs_response_code'] = BaseFieldDefinition::create('string')
      ->setLabel(t('AVS response code'))
      ->setDescription(t('The AVS response code.'))
      ->setDisplayConfigurable('view', TRUE);

    $fields['avs_response_code_label'] = BaseFieldDefinition::create('string')
      ->setLabel(t('AVS response code label'))
      ->setDescription(t('The AVS response code label.'))
      ->setDisplayConfigurable('view', TRUE);

    // These fields have been replaced by payment_gateway_mode and completed.
    // They have been temporarily kept for commerce_payment_post_update_2().
    // They are no longer used and will be removed in Commerce 2.0.
    $fields['test'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Test'))
      ->setDescription(t('Whether this is a test payment.'));
    $fields['captured'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Captured'))
      ->setDescription(t('The time when the payment was captured.'))
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

  /**
   * Gets the workflow ID for the state field.
   *
   * @param \Drupal\commerce_payment\Entity\PaymentInterface $payment
   *   The payment.
   *
   * @return string
   *   The workflow ID.
   */
  public static function getWorkflowId(PaymentInterface $payment) {
    return $payment->getType()->getWorkflowId();
  }

}
