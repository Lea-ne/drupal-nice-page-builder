<?php

namespace Drupal\mercury_editor_templates\Entity;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the Mercury Editor template entity edit forms.
 */
class MeTemplateForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New Mercury Editor template %label has been created.', $message_arguments));
        $this->logger('layout_paragraphs_templates')->notice('Created new Mercury Editor template %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The Mercury Editor template %label has been updated.', $message_arguments));
        $this->logger('layout_paragraphs_templates')->notice('Updated Mercury Editor template %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.me_template.canonical', ['me_template' => $entity->id()]);

    return $result;
  }

}
