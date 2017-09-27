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
  $as_condition = ($account_status == 'lead' || $account_status == 'unqualified');

  if ($sca_dbra == 'yes_sca' || $sca_dbra == 'yes_dbra' || $sca_dbra == 'yes_both') {
    if ($as_condition && $workflow_status == 'verification' && $action_status == 'verify_sca_dbra') {
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
  $as_condition = ($account_status == 'lead' || $account_status == 'unqualified');

  if ($plan_to_work_sca_dbra == 'yes') {
    if ($as_condition && $workflow_status == 'verification' && $action_status == 'verify_sca_dbra') {
      $wrapper->field_action_status->set('classify_to_group');
    }
  }
  $wrapper->field_plan_work_under_sca_dbra->set($plan_to_work_sca_dbra);
  $wrapper->save();

  drupal_json_output($wrapper);
}


/**
 * For updating the status to unqualified.
 */
function be_cp_unqualified() {
  $nid = $_POST['nid'];

  // Setting the new statuses of the account.
  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_account_status->set('unqualified');
  $wrapper->field_action_status->set('verify_sca_dbra');
  $wrapper->field_workflow_status->set('verification');
  $wrapper->save();

  // Clear the leads and prospects listing cache so that
  // the new account changes will reflect to the 
  // corresponding list.
  cache_clear_all('count_accounts_listing', 'cache');
  cache_clear_all('accounts_listing', 'cache');
  cache_clear_all('accounts_listing_producer_', 'cache', TRUE);
  cache_clear_all('producer_total_accounts_', 'cache', TRUE);
  cache_clear_all('leads_listing', 'cache');
  cache_clear_all('admin_leads', 'cache');
  cache_clear_all('producer_leads_listing', 'cache', TRUE);
  cache_clear_all('producer_leads', 'cache', TRUE);

  drupal_json_output('hey');
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
    $cwrapper->field_firstname->set($value['firstname']);
    $cwrapper->field_lastname->set($value['lastname']);
    $cwrapper->field_if_primary_contact->set($value['primary_contact']);
    $cwrapper->field_position->set($value['position']);
    $cwrapper->field_mobile_phone->set($value['phone']);
    $cwrapper->field_email->set($value['email']);

    // Save the field collection entity.
    $cwrapper->save();

    $item_ids[] = $collection->item_id;
  }

  foreach ($old_contacts as $key1 => $value1) {
    $collection = field_collection_item_load($value1['id']);
    $wrapper = entity_metadata_wrapper('field_collection_item', $collection);
    $wrapper->field_firstname->set($value1['firstname']);
    $wrapper->field_lastname->set($value1['lastname']);
    $wrapper->field_if_primary_contact->set($value1['primary_contact']);
    $wrapper->field_position->set($value1['position']);
    $wrapper->field_mobile_phone->set($value1['phone']);
    $wrapper->field_email->set($value1['email']);
    $wrapper->save();
  }

  cache_clear_all('count_accounts_listing', 'cache');
  cache_clear_all('accounts_listing', 'cache');
  cache_clear_all('accounts_listing_producer_', 'cache', TRUE);
  cache_clear_all('producer_total_accounts_', 'cache', TRUE);
  cache_clear_all('leads_listing', 'cache');
  cache_clear_all('admin_leads', 'cache');
  cache_clear_all('producer_leads_listing', 'cache', TRUE);
  cache_clear_all('producer_leads', 'cache', TRUE);
  cache_clear_all('primary_contact_' . $nid, 'cache');
  cache_clear_all('contacts_' . $nid, 'cache');

  drupal_json_output($_POST);
}

/**
 * Delete the contact from vpc.
 */
function be_cp_delete_contact() {
  cache_clear_all('count_accounts_listing', 'cache');
  cache_clear_all('accounts_listing', 'cache');
  cache_clear_all('accounts_listing_producer_', 'cache', TRUE);
  cache_clear_all('producer_total_accounts_', 'cache', TRUE);
  cache_clear_all('leads_listing', 'cache');
  cache_clear_all('admin_leads', 'cache');
  cache_clear_all('producer_leads_listing', 'cache', TRUE);
  cache_clear_all('producer_leads', 'cache', TRUE);
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
    $cwrapper->field_firstname->set($value['firstname']);
    $cwrapper->field_lastname->set($value['lastname']);
    $cwrapper->field_if_primary_contact->set($value['primary_contact']);
    $cwrapper->field_position->set($value['position']);
    $cwrapper->field_mobile_phone->set($value['phone']);
    $cwrapper->field_email->set($value['email']);

    // Save the field collection entity.
    $cwrapper->save();

    $item_ids[] = $collection->item_id;
  }

  foreach ($old_contacts as $key1 => $value1) {
    $collection = field_collection_item_load($value1['id']);
    $wrapper = entity_metadata_wrapper('field_collection_item', $collection);
    $wrapper->field_firstname->set($value1['firstname']);
    $wrapper->field_lastname->set($value1['lastname']);
    $wrapper->field_if_primary_contact->set($value1['primary_contact']);
    $wrapper->field_position->set($value1['position']);
    $wrapper->field_mobile_phone->set($value1['phone']);
    $wrapper->field_email->set($value1['email']);
    $wrapper->save();
  }

  cache_clear_all('count_accounts_listing', 'cache');
  cache_clear_all('accounts_listing', 'cache');
  cache_clear_all('accounts_listing_producer_', 'cache', TRUE);
  cache_clear_all('producer_total_accounts_', 'cache', TRUE);
  cache_clear_all('leads_listing', 'cache');
  cache_clear_all('admin_leads', 'cache');
  cache_clear_all('producer_leads_listing', 'cache', TRUE);
  cache_clear_all('producer_leads', 'cache', TRUE);
  cache_clear_all('primary_contact_' . $nid, 'cache');
  cache_clear_all('contacts_' . $nid, 'cache');

  drupal_json_output($_POST);
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
    cache_clear_all('workflow_status_' . $nid, 'cache');
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
  $contract_date_value = strtotime($_POST['contract_date_value']);

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_account_estimate_value->set($account_estimate_value);
  $wrapper->field_contract_date->set($contract_date_value);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'opportunity' && $workflow_status == 'plan_presentation' && $action_status == 'receive_feedback_opportunity') {
    $wrapper->field_workflow_status->set('convert_to_deals_in_progress');
    cache_clear_all('workflow_status_' . $nid, 'cache');
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
    $vars['status'] = 'opportunity';
  }

  if ($status == 'deal_in_progress') {
    $vars['hp_gta'] = 'be-gray';
    $vars['hp_poa'] = 'be-gray';
    $vars['hp_ctcd'] = 'be-gray';
    if ($account_status == 'deal_in_progress') {
      if ($workflow_status == 'generate_trust_agreement') {
        $vars['hp_gta'] = 'be-blue';
      }
      if ($workflow_status == 'proof_of_agreement') {
        $vars['hp_gta'] = 'be-green';
        $vars['hp_poa'] = 'be-blue';
      }
      if ($workflow_status == 'convert_to_closed_deals') {
        $vars['hp_gta'] = 'be-green';
        $vars['hp_poa'] = 'be-green';
        $vars['hp_ctcd'] = 'be-blue';
      }
    }
    if ($account_status == 'closed_deal') {
      $vars['hp_gta'] = 'be-green';
      $vars['hp_poa'] = 'be-green';
      $vars['hp_ctcd'] = 'be-green';
    }
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
  $contract_date_value = strtotime($_POST['contract_date_value']);
  $account_estimate_value = $_POST['account_estimate_value'];

  $wrapper = entity_metadata_wrapper('node', $nid);
  $wrapper->field_account_estimate_value->set($account_estimate_value);
  $wrapper->field_contract_date->set($contract_date_value);

  $wrapper->save();

  drupal_json_output($wrapper);

}

/**
 * Save the plan specs.
 */
function be_cp_save_plan_specs() {
  
  global $user;

  $nid = $_POST['nid'];
  $plan_specs_nid = $_POST['plan_specs_nid'];
  $fringe_rates = $_POST['fringe_rates'];
  $proposed_effective_date = $_POST['proposed_effective_date'];
  $other_work_locations = $_POST['other_work_locations'];
  $number_of_employees = $_POST['number_of_employees'];
  $number_of_dependents = $_POST['number_of_dependents'];
  $nature_of_business = $_POST['nature_of_business'];
  $years_in_business = $_POST['years_in_business'];
  $tax_id = $_POST['tax_id'];
  $renewal_date = $_POST['renewal_date'];
  $major_medical = $_POST['major_medical'];
  $limited_medical = $_POST['limited_medical'];
  $teledoc = $_POST['teledoc'];
  $mec = $_POST['mec'];
  $life = $_POST['life'];
  $short_term_disability = $_POST['short_term_disability'];
  $dental = $_POST['dental'];
  $vision = $_POST['vision'];
  $retirement = $_POST['retirement'];
  $special_benefits = $_POST['special_benefits'];
  $special_benefits_text = $_POST['special_benefits_text'];
  $company_name = $_POST['company_name'];
  $benefits = array();

  if ($major_medical == 1) {
    $benefits[] = 'major_medical';
  }
  if ($limited_medical == 1) {
    $benefits[] = 'limited_medical';
  }
  if ($teledoc == 1) {
    $benefits[] = 'teledoc';
  }
  if ($mec == 1) {
    $benefits[] = 'mec';
  }
  if ($life == 1) {
    $benefits[] = 'life';
  }
  if ($short_term_disability == 1) {
    $benefits[] = 'short_term_disability';
  }
  if ($dental == 1) {
    $benefits[] = 'dental';
  }
  if ($vision == 1) {
    $benefits[] = 'vision';
  }
  if ($retirement == 1) {
    $benefits[] = 'retirement';
  }
  if ($special_benefits == 1) {
    $benefits[] = 'special_benefits';
  }

  // Add plan specs if no existing yet.
  if ($_POST['plan_specs_nid'] == '') {
    $node = entity_create('node', array('type' => 'plan_specs'));
    $node->uid = $user->uid;
    $wrapper = entity_metadata_wrapper('node', $node);
    $plan_specs_nid = $node->nid;
  }
  else {
    // if existing just update data.
    $wrapper = entity_metadata_wrapper('node', $_POST['plan_specs_nid']);
  }

  $wrapper->title = $company_name;
  $wrapper->field_fringe_rate->set($fringe_rates);
  $wrapper->field_proposed_effective_date->set(NULL);
  if ($proposed_effective_date != '') {
    $wrapper->field_proposed_effective_date->set(strtotime($proposed_effective_date));
  }
  $wrapper->field_other_work_locations->set($other_work_locations);
  $wrapper->field_number_of_employees->set($number_of_employees);
  $wrapper->field_number_of_dependents->set($number_of_dependents);
  $wrapper->field_nature_of_business_sic->set($nature_of_business);
  $wrapper->field_years_in_business->set($years_in_business);
  $wrapper->field_tax_id->set($tax_id);
  $wrapper->field_renewal_date->set(NULL);
  if ($renewal_date != '') {
    $wrapper->field_renewal_date->set(strtotime($renewal_date));
  }
  $wrapper->field_others->set($special_benefits_text);
  $wrapper->field_benefits->set($benefits);
  $wrapper->field_account->set($nid);
  $wrapper->save();

  if ($_POST['from_button'] == 'next_generate_rfp') {

    $wrapper = entity_metadata_wrapper('node', $nid);

    $action_status = $wrapper->field_action_status->value();
    $workflow_status = $wrapper->field_workflow_status->value();
    $account_status = $wrapper->field_account_status->value();

    if ($account_status == 'opportunity' && $workflow_status == 'plan_specification' && $action_status == 'receive_plan_details') {
      $wrapper->field_action_status->set('generate_rfp');
      $wrapper->field_workflow_status->set('rfp');
    }

    cache_clear_all('workflow_status_' . $nid, 'cache');

    $wrapper->save();
  }

  drupal_json_output($plan_specs_nid);

}

/**
 * Refresh the classes in the deals in progress current progress.
 */
function be_cp_refresh_classes_deals() {
  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  $vars = array();

  $vars['class_gta'] = 'gray-check';
  $vars['class_dd'] = '';
  $vars['class_gsfi'] = '';
  $vars['class_sd'] = '';
  $vars['class_poa'] = 'gray-check';
  $vars['class_rsd'] = '';
  $vars['class_cp'] = '';
  $vars['class_ctcd'] = 'gray-check';

  $vars['modal_access_dd'] = '';
  $vars['modal_access_gsfi'] = '';
  $vars['modal_access_sd'] = '';
  $vars['modal_access_rsd'] = '';
  $vars['modal_access_cp'] = '';
  $vars['modal_access_ctcd'] = '';

  if ($workflow_status == 'generate_trust_agreement') {
    $vars['class_gta'] = 'gray-check';
    if ($action_status == 'draw_documents') {
      $vars['class_dd'] = 'current-step';
      $vars['modal_access_dd'] = 'modal';
    }
    if ($action_status == 'generate_setup_fee_invoice') {
      $vars['class_dd'] = 'done-step';
      $vars['class_gsfi'] = 'current-step';
      $vars['modal_access_dd'] = '';
      $vars['modal_access_gsfi'] = 'modal';
    }
    if ($action_status == 'send_documents') {
      $vars['class_dd'] = 'done-step';
      $vars['class_gsfi'] = 'done-step';
      $vars['class_sd'] = 'current-step';
      $vars['modal_access_dd'] = '';
      $vars['modal_access_gsfi'] = '';
      $vars['modal_access_sd'] = 'modal';
    }
  }
  elseif ($workflow_status == 'proof_of_agreement') {
    $vars['class_gta'] = 'green-check';
    $vars['class_dd'] = 'done-step';
    $vars['class_gsfi'] = 'done-step';
    $vars['class_sd'] = 'done-step';
    $vars['modal_access_dd'] = '';
    $vars['modal_access_gsfi'] = '';
    $vars['modal_access_sd'] = '';
    $vars['class_poa'] = 'gray-check';
    if ($action_status == 'receive_signed_documents') {
      $vars['class_rsd'] = 'current-step';
      $vars['modal_access_rsd'] = 'modal';
    }
    if ($action_status == 'collect_premium') {
      $vars['class_rsd'] = 'done-step';
      $vars['class_cp'] = 'current-step';
      $vars['modal_access_rsd'] = '';
      $vars['modal_access_cp'] = 'modal';
    }
  }
  elseif ($workflow_status == 'convert_to_closed_deals') {
    $vars['class_gta'] = 'green-check';
    $vars['class_dd'] = 'done-step';
    $vars['class_gsfi'] = 'done-step';
    $vars['class_sd'] = 'done-step';
    $vars['class_poa'] = 'green-check';
    $vars['class_rsd'] = 'done-step';
    $vars['class_cp'] = 'done-step';
    $vars['class_ctcd'] = 'no-check current-step';
    $vars['modal_access_ctcd'] = 'modal';
  }
  
  if ($account_status == 'closed_deal') {
    $vars['class_gta'] = 'green-check';
    $vars['class_dd'] = 'done-step';
    $vars['class_gsfi'] = 'done-step';
    $vars['class_sd'] = 'done-step';
    $vars['class_poa'] = 'green-check';
    $vars['class_rsd'] = 'done-step';
    $vars['class_cp'] = 'done-step';
    $vars['class_ctcd'] = 'green-check';
  }

  drupal_json_output($vars);
}

/**
 * Set the action status to generate invoice.
 */
function be_cp_dip_generate_invoice() {
  $nid = $_POST['nid'];

  $wrapper = entity_metadata_wrapper('node', $nid);

  $action_status = $wrapper->field_action_status->value();
  $workflow_status = $wrapper->field_workflow_status->value();
  $account_status = $wrapper->field_account_status->value();

  if ($account_status == 'deal_in_progress' && $workflow_status == 'generate_trust_agreement' && $action_status == 'draw_documents') {
    $wrapper->field_action_status->set('generate_setup_fee_invoice');
  }

  $wrapper->save();

  drupal_json_output($wrapper);
}

/**
 * Delete the setup fee invoice item.
 */
function be_cp_dip_delete_sfi() {
  $item_id = $_POST['item_id'];

  $result = entity_delete('field_collection_item', $item_id);

  drupal_json_output('success');
}

/**
 * Generate the pdf invoice and send to client.
 */
function be_cp_dip_save_exit_sfi() {
  $nid = $_POST['nid'];
  $sfi = $_POST['sfi'];
  $old_sfi = $_POST['old_sfi'];
  $send_document = $_POST['send_document'];

  $node = node_load($nid);
  $item_ids = array();

  foreach ($sfi as $key => $value) {

    // Create the collection entity and set it's "host".
    $collection = entity_create('field_collection_item', array('field_name' => 'field_setup_fee_items'));
    $collection->setHostEntity('node', $node);

    // Now define the collection parameters.
    $cwrapper = entity_metadata_wrapper('field_collection_item', $collection);
    $cwrapper->field_item_description->set($value['description']);
    $cwrapper->field_item_quantity->set($value['quantity']);
    $cwrapper->field_item_amount->set($value['amount']);

    // Save the field collection entity.
    $cwrapper->save();

    $item_ids[] = $collection->item_id;
  }

  foreach ($old_sfi as $key1 => $value1) {
    $collection = field_collection_item_load($value1['id']);
    $wrapper = entity_metadata_wrapper('field_collection_item', $collection);
    $wrapper->field_item_description->set($value1['description']);
    $wrapper->field_item_quantity->set($value1['quantity']);
    $wrapper->field_item_amount->set($value1['amount']);
    $wrapper->save();
  }

  if ($send_document == 'yes') {
    $wrapper = entity_metadata_wrapper('node', $nid);

    $action_status = $wrapper->field_action_status->value();
    $workflow_status = $wrapper->field_workflow_status->value();
    $account_status = $wrapper->field_account_status->value();

    if ($account_status == 'deal_in_progress' && $workflow_status == 'generate_trust_agreement' && $action_status == 'generate_setup_fee_invoice') {
      $wrapper->field_action_status->set('send_documents');
    }

    $wrapper->save();
  }

  drupal_json_output($_POST);
}

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Generate the pdf invoice and send to client.
 */
function be_cp_dip_send_documents_files() {
  global $base_url, $user;
  $nid = $_POST['nid'];
  $filename = $_POST['filename'];
  $attachments = array();

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['bootstrap_css'] = $base_url . '/' . $theme_directory . '/bootstrap/css/bootstrap.css';
  $vars['pdf_logo'] = $base_url . '/' . $theme_directory . '/images/archer-pdf-logo.png';

  $html = theme('invoice_pdf', $vars);

  // Generate the PDF.
  $options = new Options();
  $options->set('isRemoteEnabled', TRUE);
  $dompdf = new Dompdf($options);
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();

  // Saving pdf to server.
  $output = $dompdf->output();
  $pdf_file = file_save_data($output, 'public://'. $filename, FILE_EXISTS_REPLACE);
  $pdf_field = file_load($pdf_file->fid);

  $node = node_load($nid);
  file_usage_add($pdf_field, 'file', 'node', $node->nid); // Don't forget to add this line.
  $node->field_setup_fee_invoice[LANGUAGE_NONE][0] = array(
    'fid' => $pdf_field->fid,
    'filename' => $pdf_field->filename,
    'filemime' => $pdf_field->filemime,
    'uid' => $user->uid,
    'uri' => $pdf_field->uri,
    'status' => 1,
    'display' => 1,
  );
  node_save($node);

  // Add the PDF to attachments.
  $attachments[] = file_load($pdf_file->fid);

  // Send the email to specified recipients.
  $params = array(
    'key' => 'bullseye',
    'to' => 'ruthieborces@outlook.com',
    'from' => 'mrborces@gmail.com',
    'subject' => 'test invoice pdf',
    'body' => 'test invoice pdf',
    'attachments' => $attachments,
  );

  Bullseye::sendEmail('ruthieborces@outlook.com', 'mrborces@gmail.com', $params);
  
  drupal_json_output($wrapper);

}