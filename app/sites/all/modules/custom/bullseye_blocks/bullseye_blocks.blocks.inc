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

  $output = theme('be_bottom_header', $vars);

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

  $be = new Bullseye($user);

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  $vars['leads'] = $be->getLeadsAccounts();
  $vars['be'] = $be;
  $vars['total'] = $be->countLeadsAccnt();

  $output = theme('be_leads', $vars);

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

  $be = new Bullseye($user);

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  $vars['accounts'] = $be->getAllAccounts();
  $vars['be'] = $be;
  $vars['total'] = $be->countAllAccnt();

  $output = theme('be_accounts', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}

/**
 * Prospects Block (Table).
 */
function bullseye_blocks_render_be_prospects() {
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

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
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  $vars['arrow_green'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-green.svg';
  $vars['arrow_gray'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-gray.svg';
  $vars['arrow_orange'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-orange.svg';

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
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  $vars['arrow_green'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-green.svg';
  $vars['arrow_gray'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-gray.svg';
  $vars['arrow_orange'] = $base_url . '/' . $theme_directory . '/images/icons/be-table-arrow-orange.svg';

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
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

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
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

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
  $vars['producers'] = $be->getProducers();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  $output = theme('be_producers', $vars);

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

  $be = new Bullseye($user);

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();
  // Get the producers.
  $vars['carriers'] = $be->getCarriers();
  $vars['total_carriers'] = $be->countCarriers();

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

  $vars = array();

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

  $vars['call_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_activity_call.svg';
  $vars['send_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_activity_send.svg';
  $vars['receive_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_activity_receive.svg';
  $vars['meeting_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_activity_meeting.svg';

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

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['edit_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_edit_details.svg';

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

  $be = new Bullseye($user);

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';
  $vars['rfps'] = $be->getRfps();
  $vars['be'] = $be;

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

  $vars = array();

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

  $output = theme('be_dashboard_performance', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}
