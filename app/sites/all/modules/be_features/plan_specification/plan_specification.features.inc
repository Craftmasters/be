<?php
/**
 * @file
 * plan_specification.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function plan_specification_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function plan_specification_node_info() {
  $items = array(
    'plan_specs' => array(
      'name' => t('Plan Specs'),
      'base' => 'node_content',
      'description' => t('Plan specification entity storage.'),
      'has_title' => '1',
      'title_label' => t('Company Name'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
