<?php
/**
 * @file
 * plan_specification.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function plan_specification_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_benefits|node|plan_specs|form';
  $field_group->group_name = 'group_benefits';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'plan_specs';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Benefits Interested In',
    'weight' => '2',
    'children' => array(
      0 => 'field_benefits',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-benefits field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups['group_benefits|node|plan_specs|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_company_info|node|plan_specs|form';
  $field_group->group_name = 'group_company_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'plan_specs';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Company Information',
    'weight' => '0',
    'children' => array(
      0 => 'field_primary_contact',
      1 => 'field_title',
      2 => 'field_contact_number',
      3 => 'field_industry',
      4 => 'field_complete_address',
      5 => 'title',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-company-info field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups['group_company_info|node|plan_specs|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_plan_specs|node|plan_specs|form';
  $field_group->group_name = 'group_plan_specs';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'plan_specs';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Plan Specification',
    'weight' => '1',
    'children' => array(
      0 => 'field_fringe_rate',
      1 => 'field_proposed_effective_date',
      2 => 'field_other_work_locations',
      3 => 'field_number_of_employees',
      4 => 'field_number_of_dependents',
      5 => 'field_nature_of_business_sic',
      6 => 'field_years_in_business',
      7 => 'field_tax_id',
      8 => 'field_renewal_date',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-plan-specs field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups['group_plan_specs|node|plan_specs|form'] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t('Benefits Interested In');
  t('Company Information');
  t('Plan Specification');

  return $field_groups;
}
