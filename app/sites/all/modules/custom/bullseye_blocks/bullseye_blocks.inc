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

  // Condition for roles.
  $administrator = (is_array($user->roles) && in_array('administrator', array_values($user->roles)));
  $admin = (is_array($user->roles) && in_array('admin', array_values($user->roles)));

  $variables = array();

  $output = theme('be_top_header', $variables);

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

  $variables = array();

  $output = theme('be_bottom_header', $variables);

  return array(
    'subject' => '',
    'content' => $output,
  );
}