<?php
/**
 * @file
 * carrier.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function carrier_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function carrier_node_info() {
  $items = array(
    'carrier' => array(
      'name' => t('Carrier'),
      'base' => 'node_content',
      'description' => t('Use this form to add new carrier.'),
      'has_title' => '1',
      'title_label' => t('Carrier Name'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
