<?php
/**
 * @file
 * profiles_types.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function profiles_types_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_default_profile2_type().
 */
function profiles_types_default_profile2_type() {
  $items = array();
  $items['admin'] = entity_import('profile2_type', '{
    "userCategory" : true,
    "userView" : true,
    "type" : "admin",
    "label" : "Admin",
    "weight" : "0",
    "data" : { "registration" : 1 },
    "rdf_mapping" : []
  }');
  $items['producer'] = entity_import('profile2_type', '{
    "userCategory" : true,
    "userView" : true,
    "type" : "producer",
    "label" : "Producer",
    "weight" : "-6",
    "data" : { "registration" : 1 },
    "rdf_mapping" : []
  }');
  return $items;
}
