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
    '#markup' => '<h2>' . t('Import Leads') . '</h2>',
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

/**
 * Form submit for import leads form.
 */
function bullseye_leads_import_leads_submit($form, &$form_state) {
  global $user;

  // Initialize archerJordan class.
  $aj = new ArcherJordan($user);

  ini_set('auto_detect_line_endings', true);

  $rows = array();

  // Set the date range of each report.
  $span = array();
  $span['first_start_period'] = $form_state['values']['first_start_date'];
  $span['first_end_period'] = $form_state['values']['first_end_date'];
  $span['second_start_period'] = $form_state['values']['second_start_date'];
  $span['second_end_period'] = $form_state['values']['second_end_date'];

  // Get the value of the company from th field.
  // This is only working on admin role. Employer is not going to
  // use the field as it is automatically loaded via user profile.
  if ($form_state['values']['company_entity_reference']) {
    $company = $form_state['values']['company_entity_reference'];
  }
  else {
    // Get the company id via user profile.
    $company = array();
    $cid = $aj->getCompanyId($user->uid);
    $company = array(
      'entity_id' => $cid,
      'entity_type' => 'node',
      'entity_bundle' => 'company',
    );
  }

  // Get the value of expenses.
  if ($form_state['values']['expenses']) {
    $expenses = $form_state['values']['expenses'];
  }
  else {
    $expenses = 0;
  }

  // Get the Expenses description.
  $expenses_desc = '';
  if ($form_state['values']['expenses_desc']) {
    $expenses_desc = $form_state['values']['expenses_desc'];
  }

  if ($csv_file = file_load($form_state['values']['csv_file'])) {
    if (($handle = fopen($csv_file->uri, "r")) !== FALSE) {
      while (($data = fgetcsv($handle, NULL, ",")) !== FALSE) {
        // Validate the columns of the csv to make sure that the file
        // adhere to the template.
        if (count($data) != 4) {
          array_push($rows, $data);
        }
        else {
          drupal_set_message('The CSV is invalid.');
          exit();
        }
      }
    }
  }

  if ($rows) {
    $period = array();

    $first_row = $rows[0];
    $period['first_period'] = $first_row[2];
    $period['second_period'] = $first_row[3];

    // Remove the header row from the array.
    array_shift($rows);
    $options = array();
    $options = array(
      'company' => $company,
      'period' => $period,
      'span' => $span,
      'expenses' => $expenses,
      'expenses_desc' => $expenses_desc,
    );
    $aj->toffImportHours($rows, $options);
    drupal_goto('/');
  }
}
