<?php
/**
 * @file
 * proposal.features.field_base.inc
 */

/**
 * Implements hook_field_default_field_bases().
 */
function proposal_field_default_field_bases() {
  $field_bases = array();

  // Exported field_base: 'field_account'.
  $field_bases['field_account'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_account',
    'indexes' => array(
      'nid' => array(
        0 => 'nid',
      ),
    ),
    'locked' => 0,
    'module' => 'node_reference',
    'settings' => array(
      'profile2_private' => FALSE,
      'referenceable_types' => array(
        'accounts' => 'accounts',
        'article' => 0,
        'carrier' => 0,
        'leads' => 0,
        'page' => 0,
        'plan_specs' => 0,
        'proposal' => 0,
        'prospects' => 0,
        'rfp' => 0,
        'task' => 0,
      ),
      'view' => array(
        'args' => array(),
        'display_name' => '',
        'view_name' => '',
      ),
    ),
    'translatable' => 0,
    'type' => 'node_reference',
  );

  // Exported field_base: 'field_attached_proposal'.
  $field_bases['field_attached_proposal'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_attached_proposal',
    'indexes' => array(
      'fid' => array(
        0 => 'fid',
      ),
    ),
    'locked' => 0,
    'module' => 'file',
    'settings' => array(
      'display_default' => 0,
      'display_field' => 0,
      'profile2_private' => FALSE,
      'uri_scheme' => 'public',
    ),
    'translatable' => 0,
    'type' => 'file',
  );

  return $field_bases;
}
