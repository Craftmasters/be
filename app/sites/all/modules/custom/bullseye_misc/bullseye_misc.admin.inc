<?php
/**
 * bullseye_misc admin file.
 */

/**
 * Bullseye misc config form.
 */
function bullseye_misc_config_form($form, &$form_state) {
  $form = array();

  $form['be_vertical_tab'] = array(
    '#type' => 'vertical_tabs',
  );

  $form['files'] = array(
    '#title' => t('Files'),
    '#type' => 'fieldset',
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#tree' => TRUE,
    '#group' => 'be_vertical_tab',
  );

  $form['files']['benefit_setup'] = array(
    '#required' => TRUE,
    '#type' => 'managed_file',
    '#title' => t('Benefit Setup Template file.'),
    '#description' => t('This shows up on the deal-in-progress current progress phase of an account.'),
    '#default_value' => variable_get('benefit_setup_template'),
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg csv JPG JPEG PNG doc docx xls xlsx'),
    ),
  );

  $form['files']['payable_setup'] = array(
    '#required' => TRUE,
    '#type' => 'managed_file',
    '#title' => t('Payable Setup Template file.'),
    '#description' => t('This shows up on the deal-in-progress current progress phase of an account.'),
    '#default_value' => variable_get('payable_setup_template'),
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg csv JPG JPEG PNG doc docx xls xlsx'),
    ),
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save Configuration'),
  );

  return $form;
}

/**
 * Submit handler for Bullseye misc config form.
 */
function bullseye_misc_config_form_submit($form, &$form_state) {
  variable_set('benefit_setup_template', $form_state['values']['files']['benefit_setup']);
  variable_set('payable_setup_template', $form_state['values']['files']['payable_setup']);
  drupal_set_message('Successfully saved configuration.');
}