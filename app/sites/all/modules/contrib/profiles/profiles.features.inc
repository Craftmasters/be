<?php
/**
 * @file
 * profiles.features.inc
 */

/**
 * Implements hook_default_profile2_type().
 */
function profiles_default_profile2_type() {
  $items = array();
  $items['producer'] = entity_import('profile2_type', '{
    "userCategory" : true,
    "userView" : true,
    "type" : "producer",
    "label" : "Producer",
    "weight" : "-1",
    "data" : { "registration" : 1 },
    "rdf_mapping" : []
  }');
  return $items;
}
