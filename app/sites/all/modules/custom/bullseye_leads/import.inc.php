<?php
/**
 * BullsEye leads import file.
 */

/**
 * Import leads via CSV.
 */
function bullseye_leads_import_leads($form, &$form_state) {
  $date = format_date(time(), 'custom', 'm-d-Y');
  $format = 'm-d-Y';

  $form = array();

  $form['form_title'] = array(
    '#prefix' => '<div class="form-title">',
    '#suffix' => '</div>',
    '#markup' => '<h2>' . t('Import Monthly Hours') . '</h2>',
  );

  $form['first_period_group'] = array(
    '#type' => 'fieldset',
    '#collapsible' => TRUE,
  );

  $form['first_period_group']['first_start_date'] = array(
    '#required' => FALSE,
    '#type' => 'date_popup',
    '#title' => t('Start Date'),
    '#default_value' => $date,
    '#date_format' => $format,
    '#date_label_position' => 'within',
    '#date_increment' => 15,
    '#date_year_range' => '-3:+3',
  );

  $form['first_period_group']['first_end_date'] = array(
    '#required' => FALSE,
    '#type' => 'date_popup',
    '#title' => t('End Date'),
    '#default_value' => $date,
    '#date_format' => $format,
    '#date_label_position' => 'within',
    '#date_increment' => 15,
    '#date_year_range' => '-3:+3',
  );

  $form['second_period_group'] = array(
    '#type' => 'fieldset',
    '#collapsible' => TRUE,
  );

  $form['second_period_group']['second_start_date'] = array(
    '#required' => FALSE,
    '#type' => 'date_popup',
    '#title' => t('Start Date'),
    '#default_value' => $date,
    '#date_format' => $format,
    '#date_label_position' => 'within',
    '#date_increment' => 15,
    '#date_year_range' => '-3:+3',
  );

  $form['second_period_group']['second_end_date'] = array(
    '#required' => FALSE,
    '#type' => 'date_popup',
    '#title' => t('End Date'),
    '#default_value' => $date,
    '#date_format' => $format,
    '#date_label_position' => 'within',
    '#date_increment' => 15,
    '#date_year_range' => '-3:+3',
  );

  $form['expenses'] = array(
    '#title' => t('Expenses Amount'),
    '#type' => 'textfield',
    '#size' => 32,
    '#required' => FALSE,
  );

  $form['expenses_desc'] = array(
    '#title' => t('Expenses Description'),
    '#type' => 'textfield',
    '#size' => 32,
    '#required' => FALSE,
  );

  $form['company_entity_reference'] = array(
    '#required' => FALSE,
    '#type' => 'entityreference',
    '#title' => t('Company'),
    '#era_entity_type' => 'node',
    '#era_bundles' => array('company'),
    '#era_cardinality' => 1,
    '#era_query_settings' => array(
      'limit' => 15, // Default is 50.
      'property_conditions' => array(
        array('status', 1, '='),
      ),
      'field_conditions' => array(),
    ),
  );

  $form['csv_file'] = array(
    '#title' => t('Select File (CSV)'),
    '#type' => 'managed_file',
    '#required' => TRUE,
  );

  $form['csv_file']['#upload_validators']['file_validate_extensions'] = array('csv');

  $form['submit_container'] = array(
    '#type' => 'container',
  );

  $form['submit_container']['cancel'] = array(
    '#markup' => '<a href="/" class="overlay-close cancel">Cancel</a>',
  );

  $form['submit_container']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Import'),
  );
  return $form;
}
