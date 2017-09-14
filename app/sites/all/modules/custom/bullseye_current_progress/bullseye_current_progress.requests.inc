<?php

/**
 * For updating the lead verification field.
 */
function be_cp_lead_verify() {

  $nid = $_POST['nid'];
  $sca_dbra = $_POST['sca_dbra'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_work_sca_dbra->set($sca_dbra);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($sca_dbra == 'yes_sca' || $sca_dbra == 'yes_dbra' || $sca_dbra == 'yes_both') {
    if ($account_status == 'lead' && $workflow_status == 'verification' && $action_status == 'verify_sca_dbra') {
      $wrapper->field_action_status->set('classify_to_group');
    }
  }

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
  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($plan_to_work_sca_dbra == 'yes') {
    if ($account_status == 'lead' && $workflow_status == 'verification' && $action_status == 'verify_sca_dbra') {
      $wrapper->field_action_status->set('classify_to_group');
    }
  }
  $wrapper->field_plan_work_under_sca_dbra->set($plan_to_work_sca_dbra);
  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Saving the tags.
 */
function be_cp_save_exit_ctg() {

  $nid = $_POST['nid'];
  $tags_value = $_POST['tags_value'];

  $wrapper = entity_metadata_wrapper('node', $nid);

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
function be_cp_lead_validate_point_of_contact() {

  $nid = $_POST['nid'];
  $tags_value = $_POST['tags_value'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'lead' && $workflow_status == 'verification' && $action_status == 'classify_to_group') {
    $wrapper->field_action_status->set('validate_point_of_contact');
  }

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
 * Saving the contacts to field collection.
 */
function be_cp_save_exit_vpc() {

  $nid = $_POST['nid'];
  $contacts = $_POST['contacts'];
  $old_contacts = $_POST['old_contacts'];

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

  foreach ($old_contacts as $key1 => $value1) {
    $collection = field_collection_item_load($value1['id']);
    $wrapper = entity_metadata_wrapper('field_collection_item', $collection);
    $wrapper->field_contact_name->set($value1['name']);
    $wrapper->field_position->set($value1['position']);
    $wrapper->field_phone_number->set($value1['phone']);
    $wrapper->field_email->set($value1['email']);
    $wrapper->save();
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
  $old_contacts = $_POST['old_contacts'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'lead' && $workflow_status == 'verification' && $action_status == 'validate_point_of_contact') {
    $wrapper->field_action_status->set('set_priority');
  }
  
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

  foreach ($old_contacts as $key1 => $value1) {
    $collection = field_collection_item_load($value1['id']);
    $wrapper = entity_metadata_wrapper('field_collection_item', $collection);
    $wrapper->field_contact_name->set($value1['name']);
    $wrapper->field_position->set($value1['position']);
    $wrapper->field_phone_number->set($value1['phone']);
    $wrapper->field_email->set($value1['email']);
    $wrapper->save();
  }

  drupal_json_output($item_ids);
}

/**
 * Setting the workflow status to prospect.
 */
function be_cp_save_exit_sp() {

  $nid = $_POST['nid'];
  $priority = $_POST['priority'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_set_priority->set($priority);
  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Setting the workflow status to prospect.
 */
function be_cp_convert_to_prospect() {

  $nid = $_POST['nid'];
  $priority = $_POST['priority'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_set_priority->set($priority);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'lead' && $workflow_status == 'verification' && $action_status == 'set_priority') {
    $wrapper->field_workflow_status->set('convert_to_prospect');
  }

  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Setting the action status to receive feedback.
 */
function be_cp_receive_feedback() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();
  $action_status_condition = ($action_status == 'build_rapport' || $action_status == 'send_email');

  if ($account_status == 'prospect' && $workflow_status == 'engagement' && $action_status_condition) {
    $wrapper->field_action_status->set('receive_feedback');
  }

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
  $wrapper->field_client_interested->set('yes');
  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Updating the client interested field.
 */
function be_cp_prospect_interested_no() {
  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_client_interested->set('no');
  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Make new set of classes for the current progress block.
 */
function be_cp_refresh_classes() {
  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_set_priority->set($priority);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  $vars = array();

  $vars['class_verification'] = 'gray-check';
  $vars['class_convert_to_prospect'] = 'no-check';

  $vars['class_verify_sca_dbra'] = 'current-step';
  $vars['class_classify_to_group'] = '';
  $vars['class_validate_point_of_contact'] = '';
  $vars['class_set_priority'] = '';

  $vars['modal_access_vsd'] = '';
  $vars['modal_access_ctg'] = '';
  $vars['modal_access_vpc'] = '';
  $vars['modal_access_sp'] = '';
  $vars['modal_access_ctp'] = '';

  // Determine classes for each step.
  if ($action_status == 'verify_sca_dbra') {
    $vars['class_verify_sca_dbra'] = 'current-step';
    $vars['modal_access_vsd'] = 'modal';
  }
  elseif ($action_status == 'classify_to_group') {
    $vars['class_verify_sca_dbra'] = 'done-step';
    $vars['class_classify_to_group'] = 'current-step';
    $vars['modal_access_vsd'] = '';
    $vars['modal_access_ctg'] = 'modal';
  }
  elseif ($action_status == 'validate_point_of_contact') {
    $vars['class_verify_sca_dbra'] = 'done-step';
    $vars['class_classify_to_group'] = 'done-step';
    $vars['class_validate_point_of_contact'] = 'current-step';
    $vars['modal_access_vsd'] = '';
    $vars['modal_access_ctg'] = '';
    $vars['modal_access_vpc'] = 'modal';
  }
  elseif ($action_status == 'set_priority') {
    $vars['class_verify_sca_dbra'] = 'done-step';
    $vars['class_classify_to_group'] = 'done-step';
    $vars['class_validate_point_of_contact'] = 'done-step';
    $vars['class_set_priority'] = 'current-step';
    $vars['modal_access_vsd'] = '';
    $vars['modal_access_ctg'] = '';
    $vars['modal_access_vpc'] = '';
    $vars['modal_access_sp'] = 'modal';
    if ($workflow_status == 'convert_to_prospect') {
      $vars['class_set_priority'] = 'done-step';
      $vars['modal_access_sp'] = '';
      $vars['modal_access_ctp'] = 'modal';
    }
  }

  if ($workflow_status == 'verification') {
    $vars['class_verification'] = 'gray-check';
    $vars['class_convert_to_prospect'] = 'no-check';
  }
  elseif ($workflow_status == 'convert_to_prospect') {
    $vars['class_verification'] = 'green-check';
    $vars['class_convert_to_prospect'] = 'no-check current-step';
  }

  if ($account_status == 'prospect' ||
      $account_status == 'opportunity' ||
      $account_status == 'deal_in_progress' ||
      $account_status == 'closed_deal') {
    $vars['class_verify_sca_dbra'] = 'done-step';
    $vars['class_classify_to_group'] = 'done-step';
    $vars['class_validate_point_of_contact'] = 'done-step';
    $vars['class_set_priority'] = 'done-step';
    $vars['class_convert_to_prospect'] = 'green-check';
  }

  drupal_json_output($vars);
  
}

/**
 * Make new set of classes for the current progress block.
 */
function be_cp_refresh_classes_prospects() {
  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_set_priority->set($priority);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  $vars = array();

  $vars['class_engagement'] = 'gray-check';
  $vars['class_convert_to_opportunity'] = 'no-check';

  // Skip email campign because mailchimp not yet available.
  $vars['class_send_email_campaign'] = 'done-step';

  $vars['class_build_rapport'] = 'current-step';
  $vars['class_receive_feedback'] = '';

  $vars['modal_access_br'] = '';
  $vars['modal_access_rf'] = '';
  $vars['modal_access_cto'] = '';

  // Determine classes for each step.
  if ($action_status == 'build_rapport' || $action_status == 'send_email') {
    $vars['class_build_rapport'] = 'current-step';
    $vars['modal_access_br'] = 'modal';
  }
  elseif ($action_status == 'receive_feedback') {
    $vars['class_build_rapport'] = 'done-step';
    $vars['class_receive_feedback'] = 'current-step';
    $vars['modal_access_br'] = '';
    $vars['modal_access_rf'] = 'modal';
    if ($workflow_status == 'convert_to_opportunity') {
      $vars['class_receive_feedback'] = 'done-step';
      $vars['modal_access_rf'] = '';
      $vars['modal_access_cto'] = 'modal';
    }
  }

  if ($workflow_status == 'engagement') {
    $vars['class_engagement'] = 'gray-check';
    $vars['class_convert_to_opportunity'] = 'no-check';
  }
  elseif ($workflow_status == 'convert_to_opportunity') {
    $vars['class_engagement'] = 'green-check';
    $vars['class_convert_to_opportunity'] = 'no-check current-step';
  }

  if ($account_status == 'opportunity' ||
      $account_status == 'deal_in_progress' ||
      $account_status == 'closed_deal') {
    $vars['class_send_email_campaign'] = 'done-step';
    $vars['class_build_rapport'] = 'done-step';
    $vars['class_receive_feedback'] = 'done-step';
    $vars['class_convert_to_opportunity'] = 'green-check';
  }

  drupal_json_output($vars);
}

/**
 * Make new set of classes for the current progress block.
 */
function be_cp_refresh_classes_opportunity() {
  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  $vars = array();

  $vars['class_plan_specs'] = 'gray-check';
  $vars['class_request_specs'] = '';
  $vars['class_receive_plan'] = '';
  $vars['class_rfp'] = 'gray-check';
  $vars['class_generate_rfp'] = '';
  $vars['class_recieve_quote'] = '';
  $vars['class_plan_presentation'] = 'gray-check';
  $vars['class_send_proposal'] = '';
  $vars['class_receive_feedback'] = '';
  $vars['class_convert_deals'] = 'no-check';

  $vars['modal_access_rs'] = '';
  $vars['modal_access_rp'] = '';
  $vars['modal_access_gr'] = '';
  $vars['modal_access_rq'] = '';
  $vars['modal_access_sp'] = '';
  $vars['modal_access_rf'] = '';
  $vars['modal_access_cd'] = '';

  if ($workflow_status == 'plan_specification') {
    $vars['class_plan_specs'] = 'gray-check';
    if ($action_status == 'request_specifications') {
      $vars['class_request_specs'] = 'current-step';
      $vars['modal_access_rs'] = 'modal';
    }
    if ($action_status == 'receive_plan_details') {
      $vars['class_request_specs'] = 'done-step';
      $vars['class_receive_plan'] = 'current-step';
      $vars['modal_access_rp'] = 'modal';
    }
  }

  if ($workflow_status == 'rfp') {
    $vars['class_plan_specs'] = 'green-check';
    $vars['class_request_specs'] = 'done-step';
    $vars['class_receive_plan'] = 'done-step';
    $vars['class_rfp'] = 'gray-check';
    if ($action_status == 'generate_rfp') {
      $vars['class_generate_rfp'] = 'current-step';
      $vars['modal_access_gr'] = 'modal';
    }
    if ($action_status == 'receive_quote') {
      $vars['class_generate_rfp'] = 'done-step';
      $vars['class_recieve_quote'] = 'current-step';
      $vars['modal_access_rq'] = 'modal';
    }
  }

  if ($workflow_status == 'plan_presentation') {
    $vars['class_plan_specs'] = 'green-check';
    $vars['class_request_specs'] = 'done-step';
    $vars['class_receive_plan'] = 'done-step';
    $vars['class_rfp'] = 'green-check';
    $vars['class_generate_rfp'] = 'done-step';
    $vars['class_recieve_quote'] = 'done-step';
    $vars['class_plan_presentation'] = 'gray-check';
    if ($action_status == 'send_plan_proposal') {
      $vars['class_send_proposal'] = 'current-step';
      $vars['modal_access_sp'] = 'modal';
    }
    if ($action_status == 'receive_feedback_opportunity') {
      $vars['class_send_proposal'] = 'done-step';
      $vars['class_receive_feedback'] = 'current-step';
      $vars['modal_access_rf'] = 'modal';
    }
  }

  if ($workflow_status == 'convert_to_deals_in_progress') {
    $vars['class_plan_specs'] = 'green-check';
    $vars['class_request_specs'] = 'done-step';
    $vars['class_receive_plan'] = 'done-step';
    $vars['class_rfp'] = 'green-check';
    $vars['class_generate_rfp'] = 'done-step';
    $vars['class_recieve_quote'] = 'done-step';
    $vars['class_plan_presentation'] = 'green-check';
    $vars['class_send_proposal'] = 'done-step';
    $vars['class_receive_feedback'] = 'done-step';
    $vars['class_convert_deals'] = 'no-check current-step';
    $vars['modal_access_cd'] = 'modal';
  }

  if ($account_status == 'deal_in_progress' ||
      $account_status == 'closed_deal') {
    $vars['class_plan_specs'] = 'green-check';
    $vars['class_request_specs'] = 'done-step';
    $vars['class_receive_plan'] = 'done-step';
    $vars['class_rfp'] = 'green-check';
    $vars['class_generate_rfp'] = 'done-step';
    $vars['class_recieve_quote'] = 'done-step';
    $vars['class_plan_presentation'] = 'green-check';
    $vars['class_send_proposal'] = 'done-step';
    $vars['class_receive_feedback'] = 'done-step';
    $vars['class_convert_deals'] = 'green-check';
  }

  drupal_json_output($vars);
}

/**
 * Set action status to receive plan details.
 */
function be_cp_receive_details() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'opportunity' && $workflow_status == 'plan_specification' && $action_status == 'request_specifications') {
    $wrapper->field_action_status->set('receive_plan_details');
  }

  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Set action status to generate rfp.
 * and workflow status to RFP.
 */
function be_cp_next_generate_rfp() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'opportunity' && $workflow_status == 'plan_specification' && $action_status == 'receive_plan_details') {
    $wrapper->field_action_status->set('generate_rfp');
    $wrapper->field_workflow_status->set('rfp');
  }

  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Set action status to send plan proposal.
 * and workflow status to Plan Presentation.
 */
function be_cp_send_plan_proposal() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'opportunity' && $workflow_status == 'rfp' && $action_status == 'receive_quote') {
    $wrapper->field_action_status->set('send_plan_proposal');
    $wrapper->field_workflow_status->set('plan_presentation');
  }

  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Set workflow status to convert to deal in progress.
 */
function be_cp_accept_proposal_yes() {

  $nid = $_POST['nid'];
  $account_estimate_value = $_POST['account_estimate_value'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_account_estimate_value->set($account_estimate_value);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'opportunity' && $workflow_status == 'plan_presentation' && $action_status == 'receive_feedback_opportunity') {
    $wrapper->field_workflow_status->set('convert_to_deals_in_progress');
  }

  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Refresh classes of header progress block.
 */
function be_cp_header_classes() {
  $nid = $_POST['nid'];
  $status = $_POST['status'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  $vars = array();

  if ($status == 'lead') {
    $vars['hp_verification'] = 'be-gray';
    $vars['hp_convert_to_prospect'] = 'be-gray';
    if ($account_status == 'lead') {
      if ($workflow_status == 'verification') {
        $vars['hp_verification'] = 'be-blue';
        $vars['hp_convert_to_prospect'] = 'be-gray';
      }
      if ($workflow_status == 'convert_to_prospect') {
        $vars['hp_verification'] = 'be-green';
        $vars['hp_convert_to_prospect'] = 'be-blue';
      }
    }
    if ($account_status == 'prospect' || $account_status == 'opportunity' ||
        $account_status == 'deal_in_progress' || $account_status == 'closed_deal') {
      $vars['hp_verification'] = 'be-green';
      $vars['hp_convert_to_prospect'] = 'be-green';
    }
    $vars['status'] = 'lead';
  }

  if ($status == 'prospect') {
    $vars['hp_engagement'] = 'be-gray';
    $vars['hp_convert_to_opportunity'] = 'be-gray';
    if ($account_status == 'prospect') {
      if ($workflow_status == 'engagement') {
        $vars['hp_engagement'] = 'be-blue';
        $vars['hp_convert_to_opportunity'] = 'be-gray';
      }
      if ($workflow_status == 'convert_to_opportunity') {
        $vars['hp_engagement'] = 'be-green';
        $vars['hp_convert_to_opportunity'] = 'be-blue';
      }
    }
    if ($account_status == 'opportunity' || $account_status == 'deal_in_progress' ||
        $account_status == 'closed_deal') {
      $vars['hp_engagement'] = 'be-green';
      $vars['hp_convert_to_opportunity'] = 'be-green';
    }
    $vars['status'] = 'prospect';
  }

  if ($status == 'opportunity') {
    $vars['hp_plan_specification'] = 'be-gray';
    $vars['hp_rfp'] = 'be-gray';
    $vars['hp_plan_presentation'] = 'be-gray';
    $vars['hp_convert_to_deal'] = 'be-gray';
    if ($account_status == 'opportunity') {
      if ($workflow_status == 'plan_specification') {
        $vars['hp_plan_specification'] = 'be-blue';
        $vars['hp_rfp'] = 'be-gray';
        $vars['hp_plan_presentation'] = 'be-gray';
        $vars['hp_convert_to_deal'] = 'be-gray';
      }
      if ($workflow_status == 'rfp') {
        $vars['hp_plan_specification'] = 'be-green';
        $vars['hp_rfp'] = 'be-blue';
        $vars['hp_plan_presentation'] = 'be-gray';
        $vars['hp_convert_to_deal'] = 'be-gray';
      }
      if ($workflow_status == 'plan_presentation') {
        $vars['hp_plan_specification'] = 'be-green';
        $vars['hp_rfp'] = 'be-green';
        $vars['hp_plan_presentation'] = 'be-blue';
        $vars['hp_convert_to_deal'] = 'be-gray';
      }
      if ($workflow_status == 'convert_to_deals_in_progress') {
        $vars['hp_plan_specification'] = 'be-green';
        $vars['hp_rfp'] = 'be-green';
        $vars['hp_plan_presentation'] = 'be-green';
        $vars['hp_convert_to_deal'] = 'be-blue';
      }
    }
    if ($account_status == 'deal_in_progress' || $account_status == 'closed_deal') {
      $vars['hp_plan_specification'] = 'be-green';
      $vars['hp_rfp'] = 'be-green';
      $vars['hp_plan_presentation'] = 'be-green';
      $vars['hp_convert_to_deal'] = 'be-green';
    }
    $vars['status'] = 'deal_in_progress';
  }

  drupal_json_output($vars);

}

/**
 * Set action status to receive feedback in opportunity.
 */
function be_cp_receive_feedback_opportunity() {

  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'opportunity' && $workflow_status == 'plan_presentation' && $action_status == 'send_plan_proposal') {
    $wrapper->field_action_status->set('receive_feedback_opportunity');
  }

  $wrapper->save();
}

/**
 * Save the account estimate value field.
 */
function be_cp_save_exit_rf_op() {

  $nid = $_POST['nid'];
  $account_estimate_value = $_POST['account_estimate_value'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_account_estimate_value->set($account_estimate_value);

  $wrapper->save();

  drupal_json_output($wrapper);

}