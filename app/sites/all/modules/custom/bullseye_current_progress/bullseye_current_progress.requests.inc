<?php

/**
 * For updating the lead verification field.
 */
function be_cp_lead_verify() {

  $nid = $_POST['nid'];
  $sca_dbra = $_POST['sca_dbra'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('classify_to_group');
  $wrapper->field_work_sca_dbra->set($sca_dbra);
  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * For updating the plan to work under sca/dbra field.
 */
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

/**
 * For updating the account status to vpc.
 * Also for saving the tags.
 */
function be_cp_lead_validate_point_of_contact() {

  $nid = $_POST['nid'];
  $tags_value = $_POST['tags_value'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('validate_point_of_contact');

  $tags = explode(',', $tags_value);
  $tids = array();

  if (!empty($tags_value)) {
    foreach ($tags as $key => $value) {
      $tag = trim($value);
      $tags[$key] = $tag;

      $result = db_query('SELECT t.tid FROM {taxonomy_term_data} t WHERE t.name = :name AND t.vid = 1', array(':name' => $tag));
      $record = $result->fetchAssoc();

      if (!empty($record)) {
        $tids[] = $record['tid'];
      }
      else {
        $term = new stdClass();
        $term->name = $tag;
        $term->vid = 1;
        taxonomy_term_save($term);
        $tids[] = $term->tid;
      }

    }
    $wrapper->field_tags->set($tids);
  }
  else {
    $wrapper->field_tags->set(array());
  }
  $wrapper->save();

  drupal_json_output($tids);
}

/**
 * For updating the account status to vpc.
 * Also for saving the tags.
 */
function be_cp_save_exit_vpc() {

  $nid = $_POST['nid'];
  $contacts = $_POST['contacts'];

  $node = node_load($nid);
  $item_ids = array();

  foreach ($contacts as $key => $value) {

    // Create the collection entity and set it's "host".
    $collection = entity_create('field_collection_item', array('field_name' => 'field_contacts'));
    $collection->setHostEntity('node', $node);

    // Now define the collection parameters.
    $cwrapper = entity_metadata_wrapper('field_collection_item', $collection);
    $cwrapper->field_contact_name->set($value['name']);
    $cwrapper->field_position->set($value['position']);
    $cwrapper->field_phone_number->set($value['phone']);
    $cwrapper->field_email->set($value['email']);

    // Save the field collection entity.
    $cwrapper->save();

    $item_ids[] = $collection->item_id;
  }

  drupal_json_output($item_ids);
}

/**
 * Delete the contact from vpc.
 */
function be_cp_delete_contact() {
  $item_id = $_POST['item_id'];

  $result = entity_delete('field_collection_item', $item_id);

  drupal_json_output('success');
}

/**
 * Setting the status to set priority.
 * Also saving the contacts to field collection.
 */
function be_cp_lead_set_priority() {

  $nid = $_POST['nid'];
  $contacts = $_POST['contacts'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('set_priority');
  $wrapper->save();

  $node = node_load($nid);
  $item_ids = array();

  foreach ($contacts as $key => $value) {

    // Create the collection entity and set it's "host".
    $collection = entity_create('field_collection_item', array('field_name' => 'field_contacts'));
    $collection->setHostEntity('node', $node);

    // Now define the collection parameters.
    $cwrapper = entity_metadata_wrapper('field_collection_item', $collection);
    $cwrapper->field_contact_name->set($value['name']);
    $cwrapper->field_position->set($value['position']);
    $cwrapper->field_phone_number->set($value['phone']);
    $cwrapper->field_email->set($value['email']);

    // Save the field collection entity.
    $cwrapper->save();

    $item_ids[] = $collection->item_id;
  }

  drupal_json_output($item_ids);
}

/**
 * Setting the workflow status to prospect.
 */
function be_cp_convert_to_prospect() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_workflow_status->set('convert_to_prospect');
  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Setting the action status to receive feedback.
 */
function be_cp_receive_feedback() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_action_status->set('receive_feedback');
  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Setting the workflow status to convert to opportunity.
 */
function be_cp_convert_to_opportunity() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_workflow_status->set('convert_to_opportunity');
  $wrapper->save();

  drupal_json_output($wrapper);
}