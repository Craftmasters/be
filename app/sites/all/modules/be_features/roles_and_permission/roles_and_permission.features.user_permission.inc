<?php
/**
 * @file
 * roles_and_permission.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function roles_and_permission_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'Add plan specification'.
  $permissions['Add plan specification'] = array(
    'name' => 'Add plan specification',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'anonymous user' => 'anonymous user',
    ),
    'module' => 'bullseye_plan_specs',
  );

  // Exported permission: 'Producers registration page'.
  $permissions['Producers registration page'] = array(
    'name' => 'Producers registration page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'anonymous user' => 'anonymous user',
    ),
    'module' => 'bullseye_producer_acct',
  );

  // Exported permission: 'View File browser'.
  $permissions['View File browser'] = array(
    'name' => 'View File browser',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bullseye_producer_file',
  );

  // Exported permission: 'access accounts closed deals page'.
  $permissions['access accounts closed deals page'] = array(
    'name' => 'access accounts closed deals page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access accounts deals progress page'.
  $permissions['access accounts deals progress page'] = array(
    'name' => 'access accounts deals progress page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access accounts leads page'.
  $permissions['access accounts leads page'] = array(
    'name' => 'access accounts leads page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access accounts opportunities page'.
  $permissions['access accounts opportunities page'] = array(
    'name' => 'access accounts opportunities page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access accounts page'.
  $permissions['access accounts page'] = array(
    'name' => 'access accounts page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access accounts prospects page'.
  $permissions['access accounts prospects page'] = array(
    'name' => 'access accounts prospects page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access calendar page'.
  $permissions['access calendar page'] = array(
    'name' => 'access calendar page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access carriers page'.
  $permissions['access carriers page'] = array(
    'name' => 'access carriers page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access files page'.
  $permissions['access files page'] = array(
    'name' => 'access files page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access producers page'.
  $permissions['access producers page'] = array(
    'name' => 'access producers page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access producers pending page'.
  $permissions['access producers pending page'] = array(
    'name' => 'access producers pending page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access proposals page'.
  $permissions['access proposals page'] = array(
    'name' => 'access proposals page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'access rfps page'.
  $permissions['access rfps page'] = array(
    'name' => 'access rfps page',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_blocks',
  );

  // Exported permission: 'add account'.
  $permissions['add account'] = array(
    'name' => 'add account',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_account',
  );

  // Exported permission: 'add carrier'.
  $permissions['add carrier'] = array(
    'name' => 'add carrier',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_carriers',
  );

  // Exported permission: 'add producer'.
  $permissions['add producer'] = array(
    'name' => 'add producer',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
    ),
    'module' => 'bullseye_producer',
  );

  // Exported permission: 'add proposal'.
  $permissions['add proposal'] = array(
    'name' => 'add proposal',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_proposals',
  );

  // Exported permission: 'add rfp'.
  $permissions['add rfp'] = array(
    'name' => 'add rfp',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_rfp',
  );

  // Exported permission: 'administer bullseye config'.
  $permissions['administer bullseye config'] = array(
    'name' => 'administer bullseye config',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
    ),
    'module' => 'bullseye_misc',
  );

  // Exported permission: 'administer rfp settings'.
  $permissions['administer rfp settings'] = array(
    'name' => 'administer rfp settings',
    'roles' => array(),
    'module' => 'bullseye_rfp',
  );

  // Exported permission: 'import leads'.
  $permissions['import leads'] = array(
    'name' => 'import leads',
    'roles' => array(
      'admin' => 'admin',
      'administrator' => 'administrator',
      'producer' => 'producer',
    ),
    'module' => 'bullseye_leads',
  );

  return $permissions;
}
