<?php
/**
 * @file
 * rfp.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function rfp_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function rfp_node_info() {
  $items = array(
    'rfp' => array(
      'name' => t('RFP'),
      'base' => 'node_content',
      'description' => t('Entity type for creating RFP.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
