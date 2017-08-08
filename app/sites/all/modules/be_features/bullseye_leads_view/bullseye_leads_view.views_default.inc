<?php
/**
 * @file
 * bullseye_leads_view.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function bullseye_leads_view_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'leads';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Leads';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Leads';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'table';
  /* Field: Bulk operations: Content */
  $handler->display->display_options['fields']['views_bulk_operations']['id'] = 'views_bulk_operations';
  $handler->display->display_options['fields']['views_bulk_operations']['table'] = 'views_entity_node';
  $handler->display->display_options['fields']['views_bulk_operations']['field'] = 'views_bulk_operations';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['display_type'] = '0';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['enable_select_all_pages'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['row_clickable'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['force_single'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['entity_load_capacity'] = '10';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_operations'] = array(
    'action::views_bulk_operations_modify_action' => array(
      'selected' => 1,
      'postpone_processing' => 0,
      'skip_confirmation' => 0,
      'skip_permission_check' => 0,
      'override_label' => 0,
      'label' => '',
      'settings' => array(
        'show_all_tokens' => 1,
        'display_values' => array(
          '_all_' => '_all_',
          'accounts::field_account_status' => 'accounts::field_account_status',
          'accounts::field_type' => 'accounts::field_type',
          'accounts::field_action_status' => 'accounts::field_action_status',
          'accounts::field_workflow_status' => 'accounts::field_workflow_status',
          'accounts::field_referral_partners' => 'accounts::field_referral_partners',
        ),
      ),
    ),
  );
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: Account Status */
  $handler->display->display_options['fields']['field_account_status']['id'] = 'field_account_status';
  $handler->display->display_options['fields']['field_account_status']['table'] = 'field_data_field_account_status';
  $handler->display->display_options['fields']['field_account_status']['field'] = 'field_account_status';
  /* Field: Content: Referral Partners */
  $handler->display->display_options['fields']['field_referral_partners']['id'] = 'field_referral_partners';
  $handler->display->display_options['fields']['field_referral_partners']['table'] = 'field_data_field_referral_partners';
  $handler->display->display_options['fields']['field_referral_partners']['field'] = 'field_referral_partners';
  /* Field: Content: Workflow Status */
  $handler->display->display_options['fields']['field_workflow_status']['id'] = 'field_workflow_status';
  $handler->display->display_options['fields']['field_workflow_status']['table'] = 'field_data_field_workflow_status';
  $handler->display->display_options['fields']['field_workflow_status']['field'] = 'field_workflow_status';
  /* Field: Content: Action Status */
  $handler->display->display_options['fields']['field_action_status']['id'] = 'field_action_status';
  $handler->display->display_options['fields']['field_action_status']['table'] = 'field_data_field_action_status';
  $handler->display->display_options['fields']['field_action_status']['field'] = 'field_action_status';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'accounts' => 'accounts',
  );
  /* Filter criterion: Content: Account Status (field_account_status) */
  $handler->display->display_options['filters']['field_account_status_value']['id'] = 'field_account_status_value';
  $handler->display->display_options['filters']['field_account_status_value']['table'] = 'field_data_field_account_status';
  $handler->display->display_options['filters']['field_account_status_value']['field'] = 'field_account_status_value';
  $handler->display->display_options['filters']['field_account_status_value']['value'] = array(
    'lead' => 'lead',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'admin/content/leads';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = 'Leads';
  $handler->display->display_options['menu']['weight'] = '5';
  $handler->display->display_options['menu']['name'] = 'user-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['leads'] = $view;

  return $export;
}
