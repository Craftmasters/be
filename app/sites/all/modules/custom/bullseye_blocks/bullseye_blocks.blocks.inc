<?php

/**
 * @file
 * Author: Ruthie Hallarsis
 * Description: Block content for custom BullsEye blocks.
 */

/**
 * Top Header Block.
 */
function bullseye_blocks_render_be_top_header() {
  global $user;
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  // Condition for roles.
  $administrator = (is_array($user->roles) && in_array('administrator', array_values($user->roles)));
  $admin = (is_array($user->roles) && in_array('admin', array_values($user->roles)));

  $vars = array();
  $vars['username'] = '';

  if (isset($user->name)) {
    $vars['username'] = $user->name;
  }

  $vars['plus_icon'] = $base_url . '/' . $theme_directory . '/images/icons/plus.svg';
  $vars['envelope_icon'] = $base_url . '/' . $theme_directory . '/images/icons/mail.svg';
  $vars['gear_icon'] = $base_url . '/' . $theme_directory . '/images/icons/gear.svg';
  $vars['default_user'] = $base_url . '/' . $theme_directory . '/images/icons/default_user.svg';

  $output = theme('be_top_header', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Bottom Header Block.
 */
function bullseye_blocks_render_be_bottom_header() {
  global $user;

  $be = new Bullseye($user);

  // Condition for roles.
  $administrator = (is_array($user->roles) && in_array('administrator', array_values($user->roles)));
  $admin = (is_array($user->roles) && in_array('admin', array_values($user->roles)));

  $vars = array();

  $vars['create_rfp_page'] = FALSE;

  $vars['be_page_title'] = drupal_get_title();

  if (arg(0) == 'rfps' && arg(1) == 'add') {
    if (isset($_GET['benefits'])) {
      $vars['create_rfp_page'] = TRUE;
      $vars['be_page_title'] = t('Create New RFP') . ' - ' . $_GET['account_name'];
      $vars['be_summary_title'] = t('RFP Summary') . ' - ' . $_GET['account_name'];
    }
  }
  elseif (arg(0) == 'calendar') {
    drupal_set_title(t('Activities'));
    $vars['be_page_title'] = t('Activities');
  }
  elseif (drupal_is_front_page()) {
    if (user_is_logged_in()) {
      drupal_set_title('Dashboard');
      $vars['be_page_title'] = t('Dashboard');
    }
  }
  elseif (arg(0) == 'company') {
    $company_name = $be->getCompanyNameByAlias('content/' . arg(1));
    $vars['be_page_title'] = $company_name;
    drupal_set_title($company_name);
  }
  elseif (arg(0) == 'gmail-connector') {
    $vars['be_page_title'] = t('Mailbox');
  }

  $output = theme('be_bottom_header', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Accounts Block (Table).
 */
function bullseye_blocks_render_be_accounts() {
  global $base_url, $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  $vars['accounts'] = Bullseye::getAllAccounts();
  $vars['total'] = Bullseye::countAllAccnt();

  $vars['aliases'] = array();
  $vars['profile_pictures'] = array();

  foreach ($vars['accounts'] as $key => $value) {
    $nid = $value->nid;
    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $account_status = 'lead';
    }
    $alias = drupal_get_path_alias('node/' . $nid);
    $alias = substr($alias, 8);
    $vars['aliases'][$nid] = array(
      'alias' => $alias,
      'status' => $account_status,
    );

    // Getting the profile picture of contact.
    if ($value->field_profile_picture_fid != '') {
      $fid = $value->field_profile_picture_fid;
      $pic = file_load($fid);
      $vars['profile_pictures'][] = image_style_url('profile_picture', $pic->uri);
    }
    else {
      $vars['profile_pictures'][] = '/sites/all/themes/bullseye/images/default-user.png';
    }

    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $vars['accounts'][$key]->field_account_status_value = 'lead';
      $account_status = 'lead';
    }

    // build the edit contact person link.
    $edit_link = '/edit/contact-person?';
    $edit_link .= 'existing_company=' . $value->nid;
    $edit_link .= '&account_status=' . $account_status;
    $edit_link .= '&contact_id=' . $value->field_contacts_value;

    $vars['accounts'][$key]->edit_link = $edit_link;
  }

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['assign_producers'] = TRUE;
  $vars['delete_accounts'] = TRUE;
  if ($producer) {
    $vars['assign_producers'] = FALSE;
    $vars['delete_accounts'] = FALSE;
  }

  $output = theme('be_accounts', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Leads Block (Table).
 */
function bullseye_blocks_render_be_leads() {
  global $base_url, $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  $vars['leads'] = Bullseye::getLeadsAccounts();
  $vars['total'] = Bullseye::countLeadsAccnt();

  $vars['aliases'] = array();
  $vars['profile_pictures'] = array();

  foreach ($vars['leads'] as $key => $value) {
    $nid = $value->nid;
    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $account_status = 'lead';
    }
    $alias = drupal_get_path_alias('node/' . $nid);
    $alias = substr($alias, 8);
    $vars['aliases'][$nid] = array(
      'alias' => $alias,
      'status' => $account_status,
    );

    // Getting the profile picture of contact.
    if ($value->field_profile_picture_fid != '') {
      $fid = $value->field_profile_picture_fid;
      $pic = file_load($fid);
      $vars['profile_pictures'][] = image_style_url('profile_picture', $pic->uri);
    }
    else {
      $vars['profile_pictures'][] = '/sites/all/themes/bullseye/images/default-user.png';
    }

    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $vars['accounts'][$key]->field_account_status_value = 'lead';
      $account_status = 'lead';
    }

    // build the edit contact person link.
    $edit_link = '/edit/contact-person?';
    $edit_link .= 'existing_company=' . $value->nid;
    $edit_link .= '&account_status=' . $account_status;
    $edit_link .= '&contact_id=' . $value->field_contacts_value;

    $vars['leads'][$key]->edit_link = $edit_link;
  }

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['assign_producers'] = TRUE;
  $vars['delete_accounts'] = TRUE;
  if ($producer) {
    $vars['assign_producers'] = FALSE;
    $vars['delete_accounts'] = FALSE;
  }

  $output = theme('be_leads', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Prospects Block (Table).
 */
function bullseye_blocks_render_be_prospects() {
  global $base_url, $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  $vars['prospects'] = Bullseye::getProspectsAccounts();
  $vars['total'] = Bullseye::countProspectsAccnt();

  $vars['aliases'] = array();
  $vars['profile_pictures'] = array();

  foreach ($vars['prospects'] as $key => $value) {
    $nid = $value->nid;
    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $account_status = 'lead';
    }
    $alias = drupal_get_path_alias('node/' . $nid);
    $alias = substr($alias, 8);
    $vars['aliases'][$nid] = array(
      'alias' => $alias,
      'status' => $account_status,
    );

    // Getting the profile picture of contact.
    if ($value->field_profile_picture_fid != '') {
      $fid = $value->field_profile_picture_fid;
      $pic = file_load($fid);
      $vars['profile_pictures'][] = image_style_url('profile_picture', $pic->uri);
    }
    else {
      $vars['profile_pictures'][] = '/sites/all/themes/bullseye/images/default-user.png';
    }

    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $vars['accounts'][$key]->field_account_status_value = 'lead';
      $account_status = 'lead';
    }

    // build the edit contact person link.
    $edit_link = '/edit/contact-person?';
    $edit_link .= 'existing_company=' . $value->nid;
    $edit_link .= '&account_status=' . $account_status;
    $edit_link .= '&contact_id=' . $value->field_contacts_value;

    $vars['prospects'][$key]->edit_link = $edit_link;
  }

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['assign_producers'] = TRUE;
  $vars['delete_accounts'] = TRUE;
  if ($producer) {
    $vars['assign_producers'] = FALSE;
    $vars['delete_accounts'] = FALSE;
  }

  $output = theme('be_prospects', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Opportunities Block (Table).
 */
function bullseye_blocks_render_be_opportunities() {
  global $base_url, $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  $vars['arrow_green'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-green.svg';
  $vars['arrow_gray'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-gray.svg';
  $vars['arrow_orange'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-orange.svg';
  $vars['opportunities'] = Bullseye::getOpportunityAccounts();
  $vars['total'] = Bullseye::countOpportunityAccnt();

  foreach ($vars['opportunities'] as $key1 => $value1) {
    $workflow_status = Bullseye::getWorkflowStatusByNid($value1->nid);
    $vars['opportunities'][$key1]->plan_specs_td = $vars['arrow_gray'];
    $vars['opportunities'][$key1]->rfp_td = $vars['arrow_gray'];
    $vars['opportunities'][$key1]->plan_pres_td = $vars['arrow_gray'];
    $vars['opportunities'][$key1]->convert_td = $vars['arrow_gray'];
    if ($workflow_status == 'plan_specification') {
      $vars['opportunities'][$key1]->plan_specs_td = $vars['arrow_orange'];
      $vars['opportunities'][$key1]->rfp_td = $vars['arrow_gray'];
      $vars['opportunities'][$key1]->plan_pres_td = $vars['arrow_gray'];
      $vars['opportunities'][$key1]->convert_td = $vars['arrow_gray'];
    }
    if ($workflow_status == 'rfp') {
      $vars['opportunities'][$key1]->plan_specs_td = $vars['arrow_green'];
      $vars['opportunities'][$key1]->rfp_td = $vars['arrow_orange'];
      $vars['opportunities'][$key1]->plan_pres_td = $vars['arrow_gray'];
      $vars['opportunities'][$key1]->convert_td = $vars['arrow_gray'];
    }
    if ($workflow_status == 'plan_presentation') {
      $vars['opportunities'][$key1]->plan_specs_td = $vars['arrow_green'];
      $vars['opportunities'][$key1]->rfp_td = $vars['arrow_green'];
      $vars['opportunities'][$key1]->plan_pres_td = $vars['arrow_orange'];
      $vars['opportunities'][$key1]->convert_td = $vars['arrow_gray'];
    }
    if ($workflow_status == 'convert_to_deals_in_progress') {
      $vars['opportunities'][$key1]->plan_specs_td = $vars['arrow_green'];
      $vars['opportunities'][$key1]->rfp_td = $vars['arrow_green'];
      $vars['opportunities'][$key1]->plan_pres_td = $vars['arrow_green'];
      $vars['opportunities'][$key1]->convert_td = $vars['arrow_orange'];
    }
  }

  $vars['aliases'] = array();

  foreach ($vars['opportunities'] as $key => $value) {
    $nid = $value->nid;
    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $account_status = 'lead';
    }
    $alias = drupal_get_path_alias('node/' . $nid);
    $alias = substr($alias, 8);
    $vars['aliases'][$nid] = array(
      'alias' => $alias,
      'status' => $account_status,
    );

    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $vars['accounts'][$key]->field_account_status_value = 'lead';
      $account_status = 'lead';
    }

    // build the edit contact person link.
    $edit_link = '/edit/contact-person?';
    $edit_link .= 'existing_company=' . $value->nid;
    $edit_link .= '&account_status=' . $account_status;
    $edit_link .= '&contact_id=' . $value->field_contacts_value;

    $vars['opportunities'][$key]->edit_link = $edit_link;
  }

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['assign_producers'] = TRUE;
  $vars['delete_accounts'] = TRUE;
  if ($producer) {
    $vars['assign_producers'] = FALSE;
    $vars['delete_accounts'] = FALSE;
  }

  $output = theme('be_opportunities', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Deals in Progress Block (Table).
 */
function bullseye_blocks_render_be_deals_in_progress() {
  global $base_url, $user;

  $be = new Bullseye($user);

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  $vars['arrow_green'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-green.svg';
  $vars['arrow_gray'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-gray.svg';
  $vars['arrow_orange'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-orange.svg';
  $vars['deals'] = $be->getDealsAccounts();
  $vars['total'] = $be->countDealsInProgress();
  $vars['be'] = $be;

  foreach ($vars['deals'] as $key1 => $value1) {
    $workflow_status = Bullseye::getWorkflowStatusByNid($value1->nid);
    $vars['deals'][$key1]->gta_td = $vars['arrow_gray'];
    $vars['deals'][$key1]->pa_td = $vars['arrow_gray'];
    $vars['deals'][$key1]->ccd_td = $vars['arrow_gray'];
    if ($workflow_status == 'generate_trust_agreement') {
      $vars['deals'][$key1]->gta_td = $vars['arrow_orange'];
      $vars['deals'][$key1]->pa_td = $vars['arrow_gray'];
      $vars['deals'][$key1]->ccd_td = $vars['arrow_gray'];
    }
    if ($workflow_status == 'proof_of_agreement') {
      $vars['deals'][$key1]->gta_td = $vars['arrow_green'];
      $vars['deals'][$key1]->pa_td = $vars['arrow_orange'];
      $vars['deals'][$key1]->ccd_td = $vars['arrow_gray'];
    }
    if ($workflow_status == 'convert_to_closed_deals') {
      $vars['deals'][$key1]->gta_td = $vars['arrow_green'];
      $vars['deals'][$key1]->pa_td = $vars['arrow_green'];
      $vars['deals'][$key1]->ccd_td = $vars['arrow_orange'];
    }
  }

  $vars['aliases'] = array();
  $vars['profile_pictures'] = array();

  foreach ($vars['deals'] as $key => $value) {
    $nid = $value->nid;
    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $account_status = 'lead';
    }
    $alias = drupal_get_path_alias('node/' . $nid);
    $alias = substr($alias, 8);
    $vars['aliases'][$nid] = array(
      'alias' => $alias,
      'status' => $account_status,
    );

    // Getting the profile picture of contact.
    if ($value->field_profile_picture_fid != '') {
      $fid = $value->field_profile_picture_fid;
      $pic = file_load($fid);
      $vars['profile_pictures'][] = image_style_url('profile_picture', $pic->uri);
    }
    else {
      $vars['profile_pictures'][] = '/sites/all/themes/bullseye/images/default-user.png';
    }

    $account_status = $value->field_account_status_value;
    if ($account_status == '') {
      $vars['accounts'][$key]->field_account_status_value = 'lead';
      $account_status = 'lead';
    }

    // build the edit contact person link.
    $edit_link = '/edit/contact-person?';
    $edit_link .= 'existing_company=' . $value->nid;
    $edit_link .= '&account_status=' . $account_status;
    $edit_link .= '&contact_id=' . $value->field_contacts_value;

    $vars['deals'][$key]->edit_link = $edit_link;
  }

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['assign_producers'] = TRUE;
  $vars['delete_accounts'] = TRUE;
  if ($producer) {
    $vars['assign_producers'] = FALSE;
    $vars['delete_accounts'] = FALSE;
  }

  $output = theme('be_deals_in_progress', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Closed Deals Block (Table).
 */
function bullseye_blocks_render_be_closed_deals() {
  global $base_url, $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['assign_producers'] = TRUE;
  $vars['delete_accounts'] = TRUE;
  if ($producer) {
    $vars['assign_producers'] = FALSE;
    $vars['delete_accounts'] = FALSE;
  }

  $output = theme('be_closed_deals', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Proposals Block (Table).
 */
function bullseye_blocks_render_be_proposals() {
  global $base_url, $user;

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $be = new Bullseye($user);

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['be'] = $be;

  // Get all the proposals.
  $vars['proposals'] = Bullseye::getProposals();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  $vars['total'] = count(Bullseye::getProposals());

  $vars['aliases'] = array();

  foreach ($vars['proposals'] as $key => $value) {
    $nid = $value->field_account_nid;
    $account_status = Bullseye::getAccountStatusByNid($nid);
    if ($account_status == '') {
      $account_status = 'lead';
    }
    $alias = drupal_get_path_alias('node/' . $nid);
    $alias = substr($alias, 8);
    $vars['aliases'][$nid] = array(
      'alias' => $alias,
      'status' => $account_status,
    );
  }

  $vars['add_proposal'] = TRUE;
  $vars['delete_proposal'] = TRUE;

  // Hide the add proposal button to other roles.
  if ($producer) {
    $vars['add_proposal'] = FALSE;
    $vars['delete_proposal'] = FALSE;
  }

  $output = theme('be_proposals', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Producers Block (Table).
 */
function bullseye_blocks_render_be_producers() {
  global $base_url, $user;

  $be = new Bullseye($user);

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();
  // Get the producers.
  $vars['producers'] = Bullseye::getProducers();

  $vars['be'] = $be;

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  // Total number of producers.
  $vars['total'] = Bullseye::totalProducers();

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['delete_producer'] = TRUE;
  if ($producer) {
    $vars['delete_producer'] = FALSE;
  }

  $output = theme('be_producers', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Producers Pending Block (Table).
 */
function bullseye_blocks_render_be_producers_pending() {
  global $base_url, $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['producers'] = Bullseye::getProducers(0);
  // Total number of producers.
  $vars['total'] = Bullseye::totalProducers(0);

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  drupal_add_js(drupal_get_path('module', 'bullseye_producer_acct') . '/producer_pending.js');

  $output = theme('be_producers_pending', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Carriers Block (Table).
 */
function bullseye_blocks_render_be_carriers() {
  global $base_url, $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();
  // Get the producers.
  $vars['carriers'] = Bullseye::getCarriers();
  $vars['total_carriers'] = Bullseye::countCarriers();

  // Shortened variables.
  $vars['mm'] = 'major_medical';
  $vars['lm'] = 'limited_medical';
  $vars['td'] = 'teledoc';
  $vars['mc'] = 'mec';
  $vars['dt'] = 'dental';
  $vars['vs'] = 'vision';
  $vars['lf'] = 'life';
  $vars['sd'] = 'short_term_disability';
  $vars['sb'] = 'special_benefits';
  $vars['rm'] = 'retirement';

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['delete_carrier'] = TRUE;
  if ($producer) {
    $vars['delete_carrier'] = FALSE;
  }

  $output = theme('be_carriers', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Current Progress Block.
 */
function bullseye_blocks_render_be_current_progress() {

  $vars = array();

  $vars['cp_form'] = FALSE;

  if (isset($_GET['from'])) {
    if ($_GET['from'] == 'lead') {
      $leads_cp_form = drupal_get_form('bullseye_current_progress_leads_form');
      $vars['cp_form'] = drupal_render($leads_cp_form);
    }
    elseif ($_GET['from'] == 'prospect') {
      $prospects_cp_form = drupal_get_form('bullseye_current_progress_prospects_form');
      $vars['cp_form'] = drupal_render($prospects_cp_form);
    }
    elseif ($_GET['from'] == 'opportunity') {
      $opportunities_cp_form = drupal_get_form('bullseye_current_progress_opportunities_form');
      $vars['cp_form'] = drupal_render($opportunities_cp_form);
    }
    elseif ($_GET['from'] == 'deal_in_progress') {
      $deals_cp_form = drupal_get_form('bullseye_current_progress_deals_form');
      $vars['cp_form'] = drupal_render($deals_cp_form);
    }
    elseif ($_GET['from'] == 'closed_deal') {
      $closed_deals_cp_form = drupal_get_form('bullseye_current_progress_closed_deals_form');
      $vars['cp_form'] = drupal_render($closed_deals_cp_form);
    }
  }

  $output = theme('be_current_progress', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Create Event Block.
 */
function bullseye_blocks_render_be_create_event() {

  global $user;

  $vars = array();

  $vars['nid'] = '';

  if (arg(0) == 'company') {
    $nid = Bullseye::getNidFromPath(arg(1));
    $vars['nid'] = $nid;
    $vars['people'] = Bullseye::getAccountPeople($nid);
  }

  $output = theme('be_create_event', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Recent Activities Block.
 */
function bullseye_blocks_render_be_recent_activities() {
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $call_icon = $base_url . '/' . $theme_directory . '/images/icons/be_activity_call.svg';
  $send_icon = $base_url . '/' . $theme_directory . '/images/icons/be_activity_send.svg';
  $receive_icon = $base_url . '/' . $theme_directory . '/images/icons/be_activity_receive.svg';
  $meeting_icon = $base_url . '/' . $theme_directory . '/images/icons/be_activity_meeting.svg';

  $nid = Bullseye::getNidFromPath(arg(1));
  $vars['nid'] = $nid;
  $activities = Bullseye::getRecentActivitiesByNid($nid);

  $sorted = array();

  $be = new Bullseye($user);

  foreach ($activities as $key => $value) {
    $date = strtotime($value->field_due_date_value);
    $value->icon_img = $send_icon;

    // Contact name.
    $contact = Bullseye::getContactDetailsById($value->field_contact_value);
    $firstname = ucwords($contact['field_firstname_value']);
    $lastname = substr($contact['field_lastname_value'], 0, 1);
    $value->contact_name = $firstname . ' ' . strtoupper($lastname) . '.';
    $value->description = $value->title . ' - ';

    // For the icon and description.
    if ($value->field_task_type_value == 'phone_call') {
      $value->icon_img = $call_icon;
      $value->description = 'Call with';
    }
    elseif ($value->field_task_type_value == 'email') {
      $value->icon_img = $send_icon;
      $value->description = 'Email with';
    }
    elseif ($value->field_task_type_value == 'meeting') {
      $value->icon_img = $meeting_icon;
      $value->description = 'Meeting with';
    }

    if ($value->field_if_system_generated_value == 'yes') {
      $firstname = $be->getAccountFirstName($value->field_contact_value);
      $firstname = ucwords($firstname);
      $lastname = $be->getAccountLastName($value->field_contact_value);
      $lastname = substr($lastname, 0, 1);
      $value->contact_name = $firstname . ' ' . strtoupper($lastname) . '.';
      $value->description = $value->title . ' by ';
    }

    $value->formatted_date = date('M j', strtotime($value->field_due_date_value));
    $sorted[$date . '-' . $value->nid] = $value;
  }

  krsort($sorted);

  $vars['activities'] = $sorted;

  $output = theme('be_recent_activities', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Account Details Block.
 */
function bullseye_blocks_render_be_account_details() {
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');
  $vars = array();
  $vars['edit_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_edit_details.svg';


  $nid = Bullseye::getNidFromPath(arg(1));

  $vars['company_name'] = Bullseye::getCompanyNameByNid($nid);
  $vars['primary_email'] = 'No primary contact selected yet';
  $primary_contact = Bullseye::getAccountPrimaryContact($nid);
  if (!empty($primary_contact)) {
    $vars['primary_email'] = $primary_contact['field_email_value'];
    if (empty($vars['primary_email']) || $vars['primary_email'] == '') {
      $vars['primary_email'] = 'Primary contact has no email address';
    }
  }
  $vars['phone_number'] = Bullseye::getPhoneNumberByNid($nid);
  $vars['website'] = Bullseye::getWebsiteByNid($nid);
  $vars['street_address'] = Bullseye::getStreetAddressByNid($nid);
  $vars['city'] = Bullseye::getCityByNid($nid);
  $vars['state'] = Bullseye::getStateByNid($nid);
  $vars['zip_code'] = Bullseye::getZipCodeByNid($nid);
  $vars['business_type'] = Bullseye::getBusinessTypeByNid($nid);
  $tags = Bullseye::getTagsByNid($nid);
  $vars['tags'] = '';
  $vars['nid'] = $nid;

  foreach ($tags as $key => $value) {
    if ($key == 0) {
      $vars['tags'] .= trim($value->name);
    }
    else {
      $vars['tags'] .= ', ' . trim($value->name);
    }
  }

  $output = theme('be_account_details', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * People Block.
 */
function bullseye_blocks_render_be_people() {
  global $base_url;
  global $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();
  $nid = Bullseye::getNidFromPath(arg(1));
  $vars['people'] = Bullseye::getAccountPeople($nid);
  $vars['edit_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_edit_details.svg';

  $vars['profile_pictures'] = array();

  foreach ($vars['people'] as $key => $value) {
    // Getting the profile picture of contact.
    if ($value->field_profile_picture_fid != '') {
      $fid = $value->field_profile_picture_fid;
      $pic = file_load($fid);
      $vars['profile_pictures'][] = image_style_url('profile_picture', $pic->uri);
    }
    else {
      $vars['profile_pictures'][] = '/sites/all/themes/bullseye/images/default-user.png';
    }
  }

  $output = theme('be_people', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Files Block.
 */
function bullseye_blocks_render_be_files() {
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['file_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_files_paper.svg';
  $vars['file_download'] = $base_url . '/' . $theme_directory . '/images/icons/be_files_download.svg';

  $output = theme('be_files', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Header Progress Block.
 */
function bullseye_blocks_render_be_header_progress() {

  $vars = array();

  $output = theme('be_header_progress', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * RFPs Block (Table).
 */
function bullseye_blocks_render_be_rfps() {
  global $base_url, $user;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  $vars['rfps'] = Bullseye::getRfps();
  $vars['total'] = Bullseye::totalRfps();

  foreach ($vars['rfps'] as $key => $value) {

    $company_nid = Bullseye::getAccountNidByName($value->field_company_value);
    $account_status = Bullseye::getAccountStatusByNid($company_nid);
    if ($account_status == '') {
      $account_status = 'lead';
    }
    $alias = drupal_get_path_alias('node/' . $company_nid);
    $alias = substr($alias, 8);
    $vars['rfps'][$key]->alias_details = array(
      'alias' => $alias,
      'status' => $account_status,
    );
  }

  $producer = (is_array($user->roles) && in_array('producer', array_values($user->roles)));

  $vars['delete_rfps'] = TRUE;
  if ($producer) {
    $vars['delete_rfps'] = FALSE;
  }

  $output = theme('be_rfps', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Calendar Block.
 */
function bullseye_blocks_render_be_calendar_activities() {

  $vars = array();

  $output = theme('be_calendar_activities', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Activities Block.
 */
function bullseye_blocks_render_be_activities() {

  $vars = array();

  $output = theme('be_activities', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Tasks Block.
 */
function bullseye_blocks_render_be_tasks() {

  $vars = array();

  $output = theme('be_tasks', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Dashboard Statistics Block.
 */
function bullseye_blocks_render_be_dashboard_statistics() {
  global $base_url, $user;

  $vars = array();

  //$vars['leads_total'] = Bullseye::countLeadsAccnt();
  $vars['leads_total'] = Bullseye::getLeadsAssigned($user->uid);
  //$vars['prospects_total'] = Bullseye::countProspectsAccnt();
  $vars['prospects_total'] = Bullseye::getProspects($user->uid);
  //$vars['opportunities_total'] = Bullseye::countOpportunityAccnt();
  $vars['opportunities_total'] = Bullseye::getOpportunitiesCovered($user->uid);
  //$vars['deals_total'] = Bullseye::countDealsInProgress($user->uid);
  $vars['deals_total'] = Bullseye::getDealsInProgress($user->uid);
  //$vars['closed_deals_total'] = Bullseye::countClosedDeals();
  $vars['closed_deals_total'] = Bullseye::getDealsClosed($user->uid);

  $output = theme('be_dashboard_statistics', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Dashboard Revenue Block.
 */
function bullseye_blocks_render_be_dashboard_revenue() {

  $vars = array();

  $vars['revenue'] = Bullseye::getRevenue();
  drupal_add_js(
    array(
      'revenue_dip' => Bullseye::revenueByMonth('deal_in_progress'),
      'revenue_cds' => Bullseye::revenueByMonth('closed_deal'),
    ),
    array('type' =>'setting')
  );
  $output = theme('be_dashboard_revenue', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Dashboard Performance Block.
 */
function bullseye_blocks_render_be_dashboard_performance() {

  $vars = array();

  //$vars['performers'] = Bullseye::topPerformers();

  $output = theme('be_dashboard_performance', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}
