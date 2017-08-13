<?php

/**
 * @file
 * Gmail connector settings page.
 */

/**
 * Gmail connector configuration form.
 */
function gmail_connector_configure_form() {
  $form = array();

  $form['gmail_connector_api_key'] = array(
    '#type' => 'textfield',
    '#title' => t('GoogleAPI Key'),
    '#default_value' => variable_get('gmail_connector_api_key'),
    '#size' => 50,
    '#maxlength' => 100,
    '#description' => t("Google API Key"),
    '#required' => TRUE,
  );

  $form['gmail_connector_client_id'] = array(
    '#type' => 'textfield',
    '#title' => t('Client ID'),
    '#default_value' => variable_get('gmail_connector_client_id'),
    '#size' => 50,
    '#maxlength' => 100,
    '#description' => t("Client ID"),
    '#required' => TRUE,
  );

  $form['gmail_connector_display_email'] = array(
    '#type' => 'textfield',
    '#title' => t('Email Display'),
    '#default_value' => variable_get('gmail_connector_display_email'),
    '#size' => 2,
    '#maxlength' => 2,
    '#description' => t("Amount of emails willing to display on page."),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}
