<?php
/**
 * @file
 * roles_and_permission.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function roles_and_permission_user_default_roles() {
  $roles = array();

  // Exported role: admin.
  $roles['admin'] = array(
    'name' => 'admin',
    'weight' => 4,
  );

  // Exported role: producer.
  $roles['producer'] = array(
    'name' => 'producer',
    'weight' => 3,
  );

  return $roles;
}
