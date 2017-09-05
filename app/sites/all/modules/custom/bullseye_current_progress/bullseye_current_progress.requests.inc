<?php

// For updating the lead verification field.
function be_cp_lead_verify() {

  $nid = $_POST['nid'];
  $sca_dbra = $_POST['sca_dbra'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('classify_to_group');
  $wrapper->field_work_sca_dbra->set($sca_dbra);
  $wrapper->save();

  drupal_json_output($wrapper);
}

// For updating the plan to work under sca/dbra field.
function be_cp_plan_to_work_sca_dbra() {

  $nid = $_POST['nid'];
  $plan_to_work_sca_dbra = $_POST['plan_to_work_sca_dbra'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  if ($plan_to_work_sca_dbra == 'yes') {
    $wrapper->field_action_status->set('classify_to_group');
  }
  $wrapper->field_plan_work_under_sca_dbra->set($plan_to_work_sca_dbra);
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

function be_cp_delete_contact() {
  $item_id = $_POST['item_id'];

  $result = entity_delete('field_collection_item', $item_id);

  drupal_json_output('success');
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

function be_cp_receive_feedback() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('receive_feedback');
  $wrapper->save();

  drupal_json_output($wrapper);
}

function be_cp_convert_to_opportunity() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_workflow_status->set('convert_to_opportunity');
  $wrapper->save();

  drupal_json_output($wrapper);
}