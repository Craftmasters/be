<?php

function be_cp_lead_verify() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('classify_to_group');
  $wrapper->save();

  drupal_json_output($wrapper);
}

function be_cp_lead_validate_point_of_contact() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('validate_point_of_contact');
  $wrapper->save();

  drupal_json_output($wrapper);
}

function be_cp_lead_set_priority() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('set_priority');
  $wrapper->save();

  drupal_json_output($wrapper);
}

function be_cp_convert_to_prospect() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_workflow_status->set('convert_to_prospect');
  $wrapper->save();

  drupal_json_output($wrapper);
}