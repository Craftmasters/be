<?php

function be_cp_lead_verify() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('classify_to_group');
  $wrapper->save();

  drupal_json_output($wrapper);
}