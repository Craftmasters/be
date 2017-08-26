<?php
/**
 * @file
 * roles_and_permission.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function roles_and_permission_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: navigation_plan-specifications:plan_specs.
  $menu_links['navigation_plan-specifications:plan_specs'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'plan_specs',
    'router_path' => 'plan_specs',
    'link_title' => 'Plan Specifications',
    'options' => array(
      'identifier' => 'navigation_plan-specifications:plan_specs',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 0,
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Plan Specifications');

  return $menu_links;
}
