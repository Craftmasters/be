<?php
/**
 * @file
 * carrier.features.field_base.inc
 */

/**
 * Implements hook_field_default_field_bases().
 */
function carrier_field_default_field_bases() {
  $field_bases = array();

  // Exported field_base: 'field_benefits'.
  $field_bases['field_benefits'] = array(
    'active' => 1,
    'cardinality' => -1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_benefits',
    'indexes' => array(
      'value' => array(
        0 => 'value',
      ),
    ),
    'locked' => 0,
    'module' => 'list',
    'settings' => array(
      'allowed_values' => array(
        'major_medical' => 'Major Medical',
        'limited_medical' => 'Limited Medical',
        'teledoc' => 'Teledoc',
        'mec' => 'MEC',
        'dental' => 'Dental',
        'vision' => 'Vision',
        'life' => 'Life/AD&D',
        'short_term_disability' => 'Short Term Disability',
        'special_benefits' => 'Special Benefits',
        'retirement' => 'Retirement',
      ),
      'allowed_values_function' => '',
      'profile2_private' => FALSE,
    ),
    'translatable' => 0,
    'type' => 'list_text',
  );

  // Exported field_base: 'field_special_benefits'.
  $field_bases['field_special_benefits'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_special_benefits',
    'indexes' => array(
      'format' => array(
        0 => 'format',
      ),
    ),
    'locked' => 0,
    'module' => 'text',
    'settings' => array(
      'max_length' => 255,
      'profile2_private' => FALSE,
    ),
    'translatable' => 0,
    'type' => 'text',
  );

  return $field_bases;
}
