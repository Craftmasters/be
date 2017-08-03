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

  ini_set('auto_detect_line_endings', true);

  $rows = array();

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
    // Remove the header row from the array.
    array_shift($rows);
    $aj->toffImportHours($rows, $options);
    bullseye_leads_import($rows);
    drupal_goto('/');
  }
}
