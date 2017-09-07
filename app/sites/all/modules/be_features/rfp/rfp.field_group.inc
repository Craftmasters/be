<?php
/**
 * @file
 * rfp.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function rfp_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_attachments|node|rfp|form';
  $field_group->group_name = 'group_attachments';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Attachments',
    'weight' => '4',
    'children' => array(
      0 => 'field_broker_of_record',
      1 => 'field_current_bill',
      2 => 'field_current_summary_of_benefit',
      3 => 'field_employee_census',
      4 => 'field_large_claims_report',
      5 => 'field_last_renewal_letter_rates',
      6 => 'field_letter_of_authorization',
      7 => 'field_summary_monthly_claims',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-attachments field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_benefits|node|rfp|form';
  $field_group->group_name = 'group_benefits';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Benefits',
    'weight' => '3',
    'children' => array(
      0 => 'group_major_medical',
      1 => 'group_limited_medical',
      2 => 'group_telemedicine',
      3 => 'group_mec',
      4 => 'group_dental',
      5 => 'group_vision',
      6 => 'group_life',
      7 => 'group_short_term_disability',
      8 => 'group_retirement',
      9 => 'group_special_benefits',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Benefits',
      'instance_settings' => array(
        'required_fields' => 1,
        'id' => '',
        'classes' => 'group-benefits field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_den_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_den_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_dental';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '19',
    'children' => array(
      0 => 'field_den_plan_end',
      1 => 'field_den_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-den-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_dental|node|rfp|form';
  $field_group->group_name = 'group_dental';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Dental',
    'weight' => '9',
    'children' => array(
      0 => 'field_den_current_carrier',
      1 => 'field_den_years_current_carrier',
      2 => 'field_dn_renewal_current_plan_be',
      3 => 'field_dn_waiting_period',
      4 => 'group_den_year_to_quote',
      5 => 'group_dn_percentage_contribution',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-dental field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_dn_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_dn_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_dental';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '21',
    'children' => array(
      0 => 'field_dn_contrib_family',
      1 => 'field_dn_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-dn-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_info|node|rfp|form';
  $field_group->group_name = 'group_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Group Information',
    'weight' => '1',
    'children' => array(
      0 => 'field_city',
      1 => 'field_company',
      2 => 'field_email',
      3 => 'field_company_street_address',
      4 => 'field_frp_state',
      5 => 'field_phone_number',
      6 => 'field_website',
      7 => 'field_zip_code',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-info field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_lf_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_lf_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_life';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '20',
    'children' => array(
      0 => 'field_lf_contrib_family',
      1 => 'field_lf_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-lf-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_lf_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_lf_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_life';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '18',
    'children' => array(
      0 => 'field_lf_plan_end',
      1 => 'field_lf_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-lf-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_life|node|rfp|form';
  $field_group->group_name = 'group_life';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Life',
    'weight' => '10',
    'children' => array(
      0 => 'field_lf_current_carrier',
      1 => 'field_lf_renewal_current_plan_be',
      2 => 'field_lf_waiting_period',
      3 => 'field_lf_years_current_carrier',
      4 => 'group_lf_year_to_quote',
      5 => 'group_lf_percentage_contribution',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-life field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_limited_medical|node|rfp|form';
  $field_group->group_name = 'group_limited_medical';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Limited Medical',
    'weight' => '6',
    'children' => array(
      0 => 'field_lm_current_carrier',
      1 => 'field_lm_renewal_current_plan_be',
      2 => 'field_lm_waiting_period',
      3 => 'field_lm_years_current_carrier',
      4 => 'group_lm_year_to_quote',
      5 => 'group_lm_percentage_contribution',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-limited-medical field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_lm_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_lm_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_limited_medical';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '12',
    'children' => array(
      0 => 'field_lm_contrib_family',
      1 => 'field_lm_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-lm-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_lm_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_lm_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_limited_medical';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '10',
    'children' => array(
      0 => 'field_lm_plan_end',
      1 => 'field_lm_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-lm-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_major_medical|node|rfp|form';
  $field_group->group_name = 'group_major_medical';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Major Medical',
    'weight' => '5',
    'children' => array(
      0 => 'field_mm_current_carrier',
      1 => 'field_mm_renewal_current_plan_be',
      2 => 'field_mm_waiting_period',
      3 => 'field_mm_years_current_carrier',
      4 => 'group_mm_year_to_quote',
      5 => 'group_mm_percentage_contribution',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-major-medical field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_mc_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_mc_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_mec';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '30',
    'children' => array(
      0 => 'field_mc_contrib_family',
      1 => 'field_mc_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-mc-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_mec_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_mec_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_telemedicine';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '68',
    'children' => array(
      0 => 'field_tl_plan_end',
      1 => 'field_tl_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-mec-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_mec|node|rfp|form';
  $field_group->group_name = 'group_mec';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'MEC',
    'weight' => '8',
    'children' => array(
      0 => 'field_mc_renewal_current_plan_be',
      1 => 'field_mc_waiting_period',
      2 => 'field_mec_current_carrier',
      3 => 'field_mec_years_current_carrier',
      4 => 'group_tl_year_to_quote',
      5 => 'group_mc_percentage_contribution',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-mec field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_mm_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_mm_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_major_medical';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '12',
    'children' => array(
      0 => 'field_mm_contrib_family',
      1 => 'field_mm_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-mm-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_mm_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_mm_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_major_medical';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '10',
    'children' => array(
      0 => 'field_mm_plan_end',
      1 => 'field_mm_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-mm-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_plan_specs|node|rfp|form';
  $field_group->group_name = 'group_plan_specs';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Plan Specifications',
    'weight' => '2',
    'children' => array(
      0 => 'field_fringe_rate',
      1 => 'field_nature_of_business_sic',
      2 => 'field_number_of_dependents',
      3 => 'field_number_of_employees',
      4 => 'field_other_work_locations',
      5 => 'field_proposed_effective_date',
      6 => 'field_renewal_date',
      7 => 'field_tax_id',
      8 => 'field_years_in_business',
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
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_ret_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_ret_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_retirement';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '21',
    'children' => array(
      0 => 'field_ret_plan_end',
      1 => 'field_ret_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-ret-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_retirement|node|rfp|form';
  $field_group->group_name = 'group_retirement';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Retirement',
    'weight' => '13',
    'children' => array(
      0 => 'field_ret_current_carrier',
      1 => 'field_ret_years_current_carrier',
      2 => 'field_rt_renewal_current_plan_be',
      3 => 'field_rt_waiting_period',
      4 => 'group_ret_year_to_quote',
      5 => 'group_rt_percentage_contribution',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-retirement field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_rt_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_rt_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_retirement';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '24',
    'children' => array(
      0 => 'field_rt_contrib_family',
      1 => 'field_rt_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-rt-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_sb_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_sb_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_special_benefits';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '45',
    'children' => array(
      0 => 'field_sb_contrib_family',
      1 => 'field_sb_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-sb-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_sb_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_sb_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_special_benefits';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '43',
    'children' => array(
      0 => 'field_sb_plan_end',
      1 => 'field_sb_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-sb-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_sd_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_sd_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_short_term_disability';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '22',
    'children' => array(
      0 => 'field_sd_contrib_family',
      1 => 'field_sd_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-sd-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_short_term_disability|node|rfp|form';
  $field_group->group_name = 'group_short_term_disability';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Short Term Disability',
    'weight' => '12',
    'children' => array(
      0 => 'field_sd_renewal_current_plan_be',
      1 => 'field_sd_waiting_period',
      2 => 'field_std_current_carrier',
      3 => 'field_std_years_current_carrier',
      4 => 'group_std_year_to_quote',
      5 => 'group_sd_percentage_contribution',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-short-term-disability field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_special_benefits|node|rfp|form';
  $field_group->group_name = 'group_special_benefits';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Special Benefits',
    'weight' => '14',
    'children' => array(
      0 => 'field_sb_current_carrier',
      1 => 'field_sb_renewal_current_plan_be',
      2 => 'field_sb_waiting_period',
      3 => 'field_sb_years_current_carrier',
      4 => 'group_sb_year_to_quote',
      5 => 'group_sb_percentage_contribution',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-special-benefits field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_std_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_std_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_short_term_disability';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '20',
    'children' => array(
      0 => 'field_std_plan_end',
      1 => 'field_std_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-std-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_telemedicine|node|rfp|form';
  $field_group->group_name = 'group_telemedicine';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Telemedicine',
    'weight' => '7',
    'children' => array(
      0 => 'field_tl_current_carrier',
      1 => 'field_tl_renewal_current_plan_be',
      2 => 'field_tl_waiting_period',
      3 => 'field_tl_years_current_carrier',
      4 => 'group_tl_percentage_contribution',
      5 => 'group_mec_year_to_quote',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-telemedicine field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_tl_percentage_contribution|node|rfp|form';
  $field_group->group_name = 'group_tl_percentage_contribution';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_telemedicine';
  $field_group->data = array(
    'label' => 'Percentage of Employer Contribution',
    'weight' => '70',
    'children' => array(
      0 => 'field_tl_contrib_family',
      1 => 'field_tl_contrib_single',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-tl-percentage-contribution field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_tl_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_tl_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_mec';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '28',
    'children' => array(
      0 => 'field_mec_plan_end',
      1 => 'field_mec_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-tl-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_vision|node|rfp|form';
  $field_group->group_name = 'group_vision';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_benefits';
  $field_group->data = array(
    'label' => 'Vision',
    'weight' => '11',
    'children' => array(
      0 => 'field_vs_contrib_family',
      1 => 'field_vs_contrib_single',
      2 => 'field_vs_current_carrier',
      3 => 'field_vs_renewal_current_plan_be',
      4 => 'field_vs_waiting_period',
      5 => 'field_vs_years_current_carrier',
      6 => 'group_vs_year_to_quote',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-vision field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_vs_year_to_quote|node|rfp|form';
  $field_group->group_name = 'group_vs_year_to_quote';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'rfp';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_vision';
  $field_group->data = array(
    'label' => 'Plan Year to Quote',
    'weight' => '25',
    'children' => array(
      0 => 'field_vs_plan_end',
      1 => 'field_vs_plan_start',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-vs-year-to-quote field-group-fieldset',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $field_groups[''] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t('Attachments');
  t('Benefits');
  t('Dental');
  t('Group Information');
  t('Life');
  t('Limited Medical');
  t('MEC');
  t('Major Medical');
  t('Percentage of Employer Contribution');
  t('Plan Specifications');
  t('Plan Year to Quote');
  t('Retirement');
  t('Short Term Disability');
  t('Special Benefits');
  t('Telemedicine');
  t('Vision');

  return $field_groups;
}
