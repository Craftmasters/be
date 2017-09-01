<?php
/**
 * @file
 * context_layout.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function context_layout_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_blocks';
  $context->description = 'All blocks from the accounts page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'accounts_page' => 'accounts_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_accounts' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_accounts',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from the accounts page to be put here.');
  t('Blocks');
  $export['accounts_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_closed_deals_blocks';
  $context->description = 'All blocks from accounts/closed-deals to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'accounts_closed_deals_page' => 'accounts_closed_deals_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_closed_deals' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_closed_deals',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from accounts/closed-deals to be put here.');
  t('Blocks');
  $export['accounts_closed_deals_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_closed_deals_page';
  $context->description = 'accounts/closed-deals page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'accounts/closed-deals' => 'accounts/closed-deals',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('accounts/closed-deals page.');
  $export['accounts_closed_deals_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_deals_in_progress_blocks';
  $context->description = 'All blocks from accounts/deals-in-progress page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'accounts_deals_in_progress_page' => 'accounts_deals_in_progress_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_deals_in_progress' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_deals_in_progress',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from accounts/deals-in-progress page to be put here.');
  t('Blocks');
  $export['accounts_deals_in_progress_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_deals_in_progress_page';
  $context->description = 'accounts/deals-in-progress page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'accounts/deals-in-progress' => 'accounts/deals-in-progress',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('accounts/deals-in-progress page.');
  $export['accounts_deals_in_progress_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_leads_blocks';
  $context->description = 'All blocks from accounts/leads page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'accounts_leads_page' => 'accounts_leads_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_leads' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_leads',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from accounts/leads page to be put here.');
  t('Blocks');
  $export['accounts_leads_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_leads_page';
  $context->description = 'accounts/leads page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'accounts/leads' => 'accounts/leads',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('accounts/leads page.');
  $export['accounts_leads_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_opportunities_blocks';
  $context->description = 'All blocks from accounts/opportunities page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'accounts_opportunities_page' => 'accounts_opportunities_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_opportunities' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_opportunities',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from accounts/opportunities page to be put here.');
  t('Blocks');
  $export['accounts_opportunities_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_opportunities_page';
  $context->description = 'accounts/opportunities page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'accounts/opportunities' => 'accounts/opportunities',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('accounts/opportunities page.');
  $export['accounts_opportunities_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_page';
  $context->description = 'accounts page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'accounts' => 'accounts',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('accounts page.');
  $export['accounts_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_prospects_blocks';
  $context->description = 'All blocks from accounts/prospects page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'accounts_prospects_page' => 'accounts_prospects_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_prospects' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_prospects',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from accounts/prospects page to be put here.');
  t('Blocks');
  $export['accounts_prospects_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'accounts_prospects_page';
  $context->description = 'accounts/prospects page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'accounts/prospects' => 'accounts/prospects',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('accounts/prospects page.');
  $export['accounts_prospects_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'add_producer_page';
  $context->description = '';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'producer/add' => 'producer/add',
      ),
    ),
  );
  $context->reactions = array(
    'template_suggestions' => 'page',
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  $export['add_producer_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'calendar_blocks';
  $context->description = 'All blocks from the calendar page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'calendar_page' => 'calendar_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_calendar_activities' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_calendar_activities',
          'region' => 'column_one',
          'weight' => '-10',
        ),
        'bullseye_blocks-be_activities' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_activities',
          'region' => 'column_one',
          'weight' => '-9',
        ),
        'bullseye_blocks-be_create_event' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_create_event',
          'region' => 'column_two',
          'weight' => '-10',
        ),
        'bullseye_blocks-be_tasks' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_tasks',
          'region' => 'column_two',
          'weight' => '-9',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from the calendar page to be put here.');
  t('Blocks');
  $export['calendar_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'calendar_page';
  $context->description = 'Calendar page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'calendar' => 'calendar',
      ),
    ),
  );
  $context->reactions = array(
    'template_suggestions' => 'two_column',
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Calendar page.');
  t('Location');
  $export['calendar_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'carriers_blocks';
  $context->description = 'All blocks from the carriers page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'carriers_page' => 'carriers_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_carriers' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_carriers',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from the carriers page to be put here.');
  t('Blocks');
  $export['carriers_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'carriers_page';
  $context->description = 'carriers page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'carriers' => 'carriers',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('carriers page.');
  $export['carriers_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'company_blocks';
  $context->description = 'All blocks from the company landing page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'company_page' => 'company_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_header_progress' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_header_progress',
          'region' => 'bottom_header',
          'weight' => '-27',
        ),
        'bullseye_blocks-be_current_progress' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_current_progress',
          'region' => 'column_one',
          'weight' => '-10',
        ),
        'bullseye_blocks-be_create_event' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_create_event',
          'region' => 'column_two',
          'weight' => '-10',
        ),
        'bullseye_blocks-be_recent_activities' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_recent_activities',
          'region' => 'column_two',
          'weight' => '-9',
        ),
        'bullseye_blocks-be_account_details' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_account_details',
          'region' => 'column_three',
          'weight' => '-10',
        ),
        'bullseye_blocks-be_people' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_people',
          'region' => 'column_three',
          'weight' => '-9',
        ),
        'bullseye_blocks-be_files' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_files',
          'region' => 'column_three',
          'weight' => '-8',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from the company landing page to be put here.');
  t('Blocks');
  $export['company_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'company_page';
  $context->description = 'Company landing page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'company' => 'company',
        'company/*' => 'company/*',
        'company/*/*' => 'company/*/*',
      ),
    ),
  );
  $context->reactions = array(
    'template_suggestions' => 'three_column',
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Company landing page.');
  t('Location');
  $export['company_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'dashboard_admin_blocks';
  $context->description = 'Dashboard blocks for the admin role.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'dashboard_admin_page' => 'dashboard_admin_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_dashboard_statistics' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_dashboard_statistics',
          'region' => 'column_one',
          'weight' => '-10',
        ),
        'bullseye_blocks-be_dashboard_revenue' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_dashboard_revenue',
          'region' => 'column_one',
          'weight' => '-9',
        ),
        'bullseye_blocks-be_dashboard_performance' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_dashboard_performance',
          'region' => 'column_one',
          'weight' => '-8',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Blocks');
  t('Dashboard blocks for the admin role.');
  $export['dashboard_admin_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'dashboard_admin_page';
  $context->description = 'Dashboard for Admin Role';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '<front>' => '<front>',
      ),
    ),
    'user' => array(
      'values' => array(
        'admin' => 'admin',
        'administrator' => 'administrator',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Dashboard for Admin Role');
  t('Location');
  $export['dashboard_admin_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'files_blocks';
  $context->description = 'All blocks from the files page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'files_page' => 'files_page',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from the files page to be put here.');
  t('Blocks');
  $export['files_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'files_page';
  $context->description = 'Files page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'files' => 'files',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Files page.');
  t('Location');
  $export['files_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'pages_with_bullseye_theme';
  $context->description = 'All pages that needs to have the BullsEye theme to be put here.';
  $context->tag = 'Theme';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'node/add/accounts' => 'node/add/accounts',
        'admin/content/leads/import' => 'admin/content/leads/import',
      ),
    ),
  );
  $context->reactions = array(
    'active_theme' => array(
      'theme' => 'bullseye',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('All pages that needs to have the BullsEye theme to be put here.');
  t('Theme');
  $export['pages_with_bullseye_theme'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'producers_blocks';
  $context->description = 'All blocks from the producers page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'producers_page' => 'producers_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_producers' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_producers',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from the producers page to be put here.');
  t('Blocks');
  $export['producers_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'producers_page';
  $context->description = 'producers page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'producers' => 'producers',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('producers page.');
  $export['producers_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'proposals_blocks';
  $context->description = 'All blocks from the proposals page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'proposals_page' => 'proposals_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_proposals' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_proposals',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from the proposals page to be put here.');
  t('Blocks');
  $export['proposals_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'proposals_page';
  $context->description = 'proposals page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'proposals' => 'proposals',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('proposals page.');
  $export['proposals_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'rfps_blocks';
  $context->description = 'All blocks from the rfps page to be put here.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'context' => array(
      'values' => array(
        'rfps_page' => 'rfps_page',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_rfps' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_rfps',
          'region' => 'column_one',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('All blocks from the rfps page to be put here.');
  t('Blocks');
  $export['rfps_blocks'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'rfps_page';
  $context->description = 'rfps page.';
  $context->tag = 'Location';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'rfps' => 'rfps',
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Location');
  t('rfps page.');
  $export['rfps_page'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'sitewide_blocks';
  $context->description = 'Blocks that are seen on all pages.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'sitewide' => array(
      'values' => array(
        1 => 1,
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'bullseye_blocks-be_top_header' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_top_header',
          'region' => 'top_header',
          'weight' => '-10',
        ),
        'bullseye_blocks-be_bottom_header' => array(
          'module' => 'bullseye_blocks',
          'delta' => 'be_bottom_header',
          'region' => 'bottom_header',
          'weight' => '-10',
        ),
        'superfish-1' => array(
          'module' => 'superfish',
          'delta' => '1',
          'region' => 'left_sidebar',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Blocks');
  t('Blocks that are seen on all pages.');
  $export['sitewide_blocks'] = $context;

  return $export;
}
