<?php

namespace Drupal\Tests\paragraphs_features\FunctionalJavascript;

/**
 * Tests the add in between paragraphs feature.
 *
 * @todo Move widget settings form tests in separate class.
 *
 * @group paragraphs_features
 */
class ParagraphsFeaturesAddInBetweenTest extends ParagraphsFeaturesJavascriptTestBase {

  /**
   * Tests the add widget button with modal form.
   */
  public function testAddInBetweenFeature() {
    // Create paragraph types and content types with required configuration for
    // testing of add in between feature.
    $content_type = 'test_modal_delta';

    // Create nested paragraph with addition of one text test paragraph.
    $this->createTestConfiguration($content_type, 1);

    // Test that 3rd party option is available only when modal mode is enabled.
    $this->drupalGet("admin/structure/types/manage/$content_type/form-display");
    $session = $this->getSession();
    $page = $session->getPage();
    $driver = $session->getDriver();
    $page->pressButton('field_paragraphs_settings_edit');
    $this->assertSession()->assertWaitOnAjaxRequest();

    // By default a non modal add mode should be selected.
    $is_option_visible = $session->evaluateScript("Array.from(document.querySelectorAll('.paragraphs-features__add-in-between__option')).filter((item) => { return item.offsetParent }).length === 0");
    $this->assertEquals(TRUE, $is_option_visible, 'By default "add in between" option should not be visible.');

    // Check that add in between option is available for modal add mode.
    $page->selectFieldOption('fields[field_paragraphs][settings_edit_form][settings][add_mode]', 'modal');
    $session->executeScript("jQuery('[name=\"fields[field_paragraphs][settings_edit_form][settings][add_mode]\"]').trigger('change');");
    $is_option_visible = $session->evaluateScript("Array.from(document.querySelectorAll('.paragraphs-features__add-in-between__option')).filter((item) => { return !item.disabled }).length === 1");
    $this->assertEquals(TRUE, $is_option_visible, 'After modal add mode is selected, "add in between" option should be available.');
    $page->checkField('fields[field_paragraphs][settings_edit_form][third_party_settings][paragraphs_features][add_in_between]');
    $page->fillField('fields[field_paragraphs][settings_edit_form][third_party_settings][paragraphs_features][add_in_between_link_count]', '0');
    $is_checked = $session->evaluateScript("document.querySelector('.paragraphs-features__add-in-between__option').checked");
    $this->assertEquals(TRUE, $is_checked, 'Checkbox should be checked.');

    // Check that add in between option is not available for non modal add mode.
    $page->selectFieldOption('fields[field_paragraphs][settings_edit_form][settings][add_mode]', 'dropdown');
    $session->executeScript("jQuery('[name=\"fields[field_paragraphs][settings_edit_form][settings][add_mode]\"]').trigger('change');");

    $is_option_visible = $session->evaluateScript("Array.from(document.querySelectorAll('.paragraphs-features__add-in-between__option')).filter((item) => { return item.offsetParent }).length === 0");
    $this->assertEquals(TRUE, $is_option_visible, 'After add mode is change to non modal, "add in between" option should not be visible.');
    $is_disabled = $session->evaluateScript("document.querySelector('.paragraphs-features__add-in-between__option').disabled");
    $this->assertEquals(TRUE, $is_disabled, 'After add mode is change to non modal, "add in between" option should be disabled.');

    // Set modal add mode without add in between option.
    $page->selectFieldOption('fields[field_paragraphs][settings_edit_form][settings][add_mode]', 'modal');
    $session->executeScript("jQuery('[name=\"fields[field_paragraphs][settings_edit_form][settings][add_mode]\"]').trigger('change');");
    $page->uncheckField('fields[field_paragraphs][settings_edit_form][third_party_settings][paragraphs_features][add_in_between]');

    $this->submitForm([], 'Update');
    $this->assertSession()->assertWaitOnAjaxRequest();
    $this->submitForm([], 'Save');

    // Check that default add mode functionality is used.
    $this->drupalGet("node/add/$content_type");
    $this->assertEquals(TRUE, $driver->isVisible('//*[@name="button_add_modal"]'), 'Default "Add Paragraph" button should be visible.');
    $this->assertSession()->elementNotExists('xpath', '//button[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")]');

    // Set modal add mode with add in between option.
    $this->drupalGet("admin/structure/types/manage/$content_type/form-display");
    $page->pressButton('field_paragraphs_settings_edit');
    $this->assertSession()->assertWaitOnAjaxRequest();

    $page->checkField('fields[field_paragraphs][settings_edit_form][third_party_settings][paragraphs_features][add_in_between]');
    $page->fillField('fields[field_paragraphs][settings_edit_form][third_party_settings][paragraphs_features][add_in_between_link_count]', '0');

    $this->submitForm([], 'Update');
    $this->assertSession()->assertWaitOnAjaxRequest();
    $this->submitForm([], 'Save');

    // Check that add in between functionality is used.
    $this->drupalGet("node/add/$content_type");
    $this->assertEquals(FALSE, $driver->isVisible('//*[@name="button_add_modal"]'), 'Default "Add Paragraph" button should be hidden.');
    $this->assertEquals(TRUE, $driver->isVisible('//button[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")]'), 'New add in between button should be visible.');

    // Add a nested paragraph and check that add in between is used only for
    // base paragraphs field, but not for the nested paragraph.
    $session->executeScript("document.querySelector('.paragraphs-features__add-in-between__button').click()");
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_nested")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    $base_buttons = $page->findAll('xpath', '//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ") and not(ancestor::div[contains(@class, "paragraphs-nested")])]');
    $this->assertEquals(2, count($base_buttons), "There should be 2 add in between buttons for base paragraphs.");
    $base_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and not(ancestor::div[contains(@class, "paragraphs-nested")]) and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(0, count($base_default_button), "There should be no default button for base paragraphs.");

    $nested_buttons = $page->findAll('xpath', '//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ") and ancestor::div[contains(@class, "paragraphs-nested")]]');
    $this->assertEquals(0, count($nested_buttons), "There should be no add in between buttons for nested paragraph.");
    $nested_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and ancestor::div[contains(@class, "paragraphs-nested")] and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(1, count($nested_default_button), "There should be a default button for nested paragraph.");

    // Check first add in between button.
    $page->find('xpath', '(//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")])[1]')->click();
    $this->assertSession()->hiddenFieldValueEquals('field_paragraphs[add_more][add_more_delta]', '0');
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_1")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    // Check last add in between button.
    $this->scrollClick('xpath', '(//*[contains(@class, "paragraphs-features__add-in-between__button ")])[last()]');
    $this->assertSession()->hiddenFieldValueEquals('field_paragraphs[add_more][add_more_delta]', '2');
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_1")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    // Check add in between button between existing paragraphs.
    $page->find('xpath', '(//*[contains(@class, "paragraphs-features__add-in-between__button ")])[3]')->click();
    $this->assertSession()->hiddenFieldValueEquals('field_paragraphs[add_more][add_more_delta]', '2');
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_1")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    $base_buttons = $page->findAll('xpath', '//*[contains(@class, "paragraphs-features__add-in-between__button ") and not(ancestor::div[contains(@class, "paragraphs-nested")])]');
    $this->assertEquals(5, count($base_buttons), "There should be 5 add in between buttons for base paragraphs.");
    $base_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and not(ancestor::div[contains(@class, "paragraphs-nested")]) and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(0, count($base_default_button), "There should be no default button for base paragraphs.");

    $nested_buttons = $page->findAll('xpath', '//*[contains(@class, "paragraphs-features__add-in-between__button ") and ancestor::div[contains(@class, "paragraphs-nested")]]');
    $this->assertEquals(0, count($nested_buttons), "There should be no add in between buttons for nested paragraph.");
    $nested_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and ancestor::div[contains(@class, "paragraphs-nested")] and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(1, count($nested_default_button), "There should be a default button for nested paragraph.");

    // Set modal add mode without add in between option for base paragraphs.
    $this->drupalGet("admin/structure/types/manage/$content_type/form-display");
    $page->pressButton('field_paragraphs_settings_edit');
    $this->assertSession()->assertWaitOnAjaxRequest();
    $page->uncheckField('fields[field_paragraphs][settings_edit_form][third_party_settings][paragraphs_features][add_in_between]');
    $this->submitForm([], 'Update');
    $this->assertSession()->assertWaitOnAjaxRequest();
    $this->submitForm([], 'Save');

    // Set modal add mode with add in between option for nested paragraph.
    $this->drupalGet("admin/structure/paragraphs_type/test_nested/form-display");
    $page->pressButton('field_paragraphs_settings_edit');
    $this->assertSession()->assertWaitOnAjaxRequest();
    $page->selectFieldOption('fields[field_paragraphs][settings_edit_form][settings][add_mode]', 'modal');
    $session->executeScript("jQuery('[name=\"fields[field_paragraphs][settings_edit_form][settings][add_mode]\"]').trigger('change');");
    $page->checkField('fields[field_paragraphs][settings_edit_form][third_party_settings][paragraphs_features][add_in_between]');
    $page->fillField('fields[field_paragraphs][settings_edit_form][third_party_settings][paragraphs_features][add_in_between_link_count]', '0');
    $this->submitForm([], 'Update');
    $this->assertSession()->assertWaitOnAjaxRequest();
    $this->submitForm([], 'Save');

    // Check that add in between functionality is not available for base
    // paragraphs and it's used for nested paragraph.
    $this->drupalGet("node/add/$content_type");

    $session->executeScript("document.querySelector('.paragraph-type-add-modal-button').click()");
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_nested")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    $base_buttons = $page->findAll('xpath', '//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ") and not(ancestor::div[contains(@class, "paragraphs-nested")])]');
    $this->assertEquals(0, count($base_buttons), "There should be no add in between button for base paragraphs.");
    $base_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and not(ancestor::div[contains(@class, "paragraphs-nested")]) and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(1, count($base_default_button), "There should be a default button for base paragraphs.");

    $nested_buttons = $page->findAll('xpath', '//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ") and ancestor::div[contains(@class, "paragraphs-nested")]]');
    $this->assertEquals(1, count($nested_buttons), "There should be an add in between button for nested paragraph.");
    $nested_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and ancestor::div[contains(@class, "paragraphs-nested")] and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(0, count($nested_default_button), "There should be no default button for nested paragraph.");

    // Check first add in between button.
    $page->find('xpath', '(//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")])[1]')->click();
    $this->assertSession()->hiddenFieldValueEquals('field_paragraphs[0][subform][field_paragraphs][add_more][add_more_delta]', '0');
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_1")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    // Check last add in between button.
    $this->scrollClick('xpath', '(//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")])[last()]');
    $this->assertSession()->hiddenFieldValueEquals('field_paragraphs[0][subform][field_paragraphs][add_more][add_more_delta]', '1');
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_1")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    // Check add in between button between existing paragraphs.
    $page->find('xpath', '(//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")])[2]')->click();
    $this->assertSession()->hiddenFieldValueEquals('field_paragraphs[0][subform][field_paragraphs][add_more][add_more_delta]', '1');
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_1")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    $base_buttons = $page->findAll('xpath', '//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ") and not(ancestor::div[contains(@class, "paragraphs-nested")])]');
    $this->assertEquals(0, count($base_buttons), "There should be no add in between button for base paragraphs.");
    $base_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and not(ancestor::div[contains(@class, "paragraphs-nested")]) and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(1, count($base_default_button), "There should be a default button for base paragraphs.");

    $nested_buttons = $page->findAll('xpath', '//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ") and ancestor::div[contains(@class, "paragraphs-nested")]]');
    $this->assertEquals(4, count($nested_buttons), "There should be 4 add in between buttons for nested paragraph.");
    $nested_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and ancestor::div[contains(@class, "paragraphs-nested")] and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(0, count($nested_default_button), "There should be no default button for nested paragraph.");

    // Check status after cardinality is exceeded.
    $page->find('xpath', '(//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")])[2]')->click();
    $page->find('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_1")]')->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    $base_buttons = $page->findAll('xpath', '//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ") and not(ancestor::div[contains(@class, "paragraphs-nested")])]');
    $this->assertEquals(0, count($base_buttons), "There should be no add in between button for base paragraphs.");
    $base_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and not(ancestor::div[contains(@class, "paragraphs-nested")]) and not(ancestor::div[contains(@style,"display: none;")])]');
    $this->assertEquals(1, count($base_default_button), "There should be a default button for base paragraphs.");

    $nested_buttons = $page->findAll('xpath', '//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ") and ancestor::div[contains(@class, "paragraphs-nested")]]');
    $this->assertEquals(0, count($nested_buttons), "There should be no add in between button for nested paragraph.");
    $nested_default_button = $page->findAll('xpath', '//*[contains(@class, "paragraph-type-add-modal-button") and ancestor::div[contains(@class, "paragraphs-nested")]]');
    $this->assertEquals(0, count($nested_default_button), "There should be no default button for nested paragraph.");
  }

  /**
   * Tests multiple add buttons.
   */
  public function testAddInBetweenLinkCountFeature() {
    // Create paragraph types and content types with required configuration for
    // testing of add in between feature.
    $content_type = 'test_modal_delta';

    // Create nested paragraph with addition of one text test paragraph.
    $this->createTestConfiguration($content_type, 3);

    $display_repository = $this->container->get('entity_display.repository');

    $form_display = $display_repository->getFormDisplay('node', $content_type, 'default');
    $field_config = $form_display->getComponent('field_paragraphs');
    $field_config['settings']['add_mode'] = 'modal';
    $field_config['third_party_settings']['paragraphs_features']['add_in_between'] = TRUE;
    $field_config['third_party_settings']['paragraphs_features']['add_in_between_link_count'] = 1;
    $form_display->setComponent('field_paragraphs', $field_config)->save();

    $this->drupalGet("node/add/$content_type");
    $this->assertJsCondition("document.querySelectorAll('.paragraphs-features__add-in-between__button').length === 2");
    $this->getSession()->getDriver()->click('(//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")])[2]');
    $this->assertSession()->waitForElementVisible('xpath', '//*[contains(@class, "paragraphs-add-dialog") and contains(@class, "ui-dialog-content")]//*[contains(@name, "test_nested")]');
    $this->assertJsCondition('Array.from(document.querySelectorAll(".paragraphs-add-dialog.ui-dialog-content input")).filter((item) => { return item.offsetParent }).length === 3');
    $this->getSession()->getDriver()->click('//*[contains(@class, "ui-dialog")]//button[contains(@class, "dialog-titlebar-close")]');
    $this->getSession()->getDriver()->click('(//*[contains(concat(" ", normalize-space(@class), " "), " paragraphs-features__add-in-between__button ")])[1]');
    $this->assertSession()->waitForElementVisible('xpath', '//*[data-drupal-selector="edit-field-paragraphs-0-subform-text-1-wrapper"]');
  }

}
