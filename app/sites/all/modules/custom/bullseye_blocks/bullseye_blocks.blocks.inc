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
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

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
  global $base_url;

  $theme_directory = path_to_theme('theme', 'bullseye');

  $vars = array();

  $vars['magnifying_glass'] = $base_url . '/' . $theme_directory . '/images/icons/magnifying_glass_gray.svg';
  $vars['three_bars'] = $base_url . '/' . $theme_directory . '/images/icons/three_bars.svg';
  $vars['single_user_gray'] = $base_url . '/' . $theme_directory . '/images/icons/single_user_gray.svg';
  $vars['gray_gear'] = $base_url . '/' . $theme_directory . '/images/icons/gray_gear.svg';

  $output = theme('be_accounts', $vars);

  return array(
    'subject' => '',
    'content' => $output,
  );
}