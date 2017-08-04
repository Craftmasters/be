<?php
/**
 * @file
 * prospects_node_type.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function prospects_node_type_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function prospects_node_type_node_info() {
  $items = array(
    'prospects' => array(
      'name' => t('Prospects'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
