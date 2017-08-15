<?php
/**
 * @file
 * profiles_types.features.inc
 */

/**
 * Implements hook_default_profile2_type().
 */
function profiles_types_default_profile2_type() {
  $items = array();
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
