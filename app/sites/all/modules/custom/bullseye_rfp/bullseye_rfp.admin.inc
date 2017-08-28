<?php
/**
 * Admin page for RFP.
 */
function bullseye_rfp_admin_form($form, &$form_state) {
  $form = array();

  $form['rfp_subject'] = array(
    '#type' => 'textfield',
    '#title' => t('Email Subject'),
    '#attributes' => array(
      'placeholder' => 'Email Subject',
    ),
  );

  $form['rfp_body'] = array(
    '#type'=>'text_format',
    '#title' => t('Email Body'),
    '#default_value' => variable_get('rfp_body', t('')),
    '#format'=>'full_html',
  );

  return system_settings_form($form);
}
