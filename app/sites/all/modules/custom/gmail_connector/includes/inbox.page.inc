<?php

/**
 * @file
 * Gmail connector landing page.
 */

/**
 * Gmail connector email inbox page.
 */
function gmail_connector_inbox() {
  //drupal_add_js('https://code.jquery.com/jquery-1.11.3.min.js', 'external');
  drupal_add_js('https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js', 'external');
  drupal_add_js(drupal_get_path('module', 'gmail_connector') . '/js/utilities.js');
  drupal_add_js('https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.js', 'external');
  drupal_add_js('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', 'external');
  drupal_add_css('https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css', 'external');
  drupal_add_css(drupal_get_path('module', 'gmail_connector') . '/css/utilities.css');
  drupal_add_css(drupal_get_path('module', 'gmail_connector') . '/css/pace-theme-center-radar.css');
  drupal_add_css(drupal_get_path('module', 'gmail_connector') . '/css/bootstrap.css');
  $page = array();
  $settings = array();
  $settings['google_api_key'] = variable_get('gmail_connector_api_key');
  $settings['google_client_id'] = variable_get('gmail_connector_client_id');
  $settings['google_email_display'] = variable_get('gmail_connector_display_email');

  // Add the configuration in the Javascript scope.
  drupal_add_js(array(
    'gmail_connector' => array(
      'config' => $settings,
    ),
  ), array('type' => 'setting'));

  return theme('gmail_connector_gmail_inbox_theme', array('page' => $page));
}
