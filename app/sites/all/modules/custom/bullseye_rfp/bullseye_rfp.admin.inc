<?php
/**
 * Admin page for RFP.
 */
function bullseye_rfp_admin_form($form_state) {
  $form = array();

  $tmp = variable_get('rfp_body', array('value' => '', 'format' => NULL));

  $form['rfp_subject'] = array(
    '#type' => 'textfield',
    '#title' => t('Email Subject'),
    '#default_value' => variable_get('rfp_subject', t('RFP')),
    '#attributes' => array(
      'placeholder' => 'Email Subject',
    ),
  );

  $form['rfp_body'] = array(
    '#type' => 'text_format',
    '#title' => t('Email Body'),
    '#default_value' => $tmp['value'],
    '#format' => 'full_html',
  );

  return system_settings_form($form);
}
