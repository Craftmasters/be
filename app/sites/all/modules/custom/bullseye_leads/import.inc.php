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

  $form['#attributes']['class'][] = 'be-forms be-forms-custom';

  $form['form_title'] = array(
    '#prefix' => '<div class="form-title">',
    '#suffix' => '</div>',
    '#markup' => '<h2>' . t('Import Leads') . '</h2>',
  );

  $form['type_options'] = array(
    '#type' => 'value',
    '#value' => array(
      'leads' => t('Leads'),
      'prospects' => t('Prospect'),
    ),
  );
  $form['type'] = array(
    '#title' => t('Account Type'),
    '#type' => 'select',
    '#options' => $form['type_options']['#value'],
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
    '#markup' => '<a class="gray-btn" href="/" onClick="parent.Lightbox.end();">Cancel</a>',
  );

  $form['submit_container']['submit'] = array(
    '#type' => 'submit',
    '#attributes' => array(
      'class' => array('green-btn'),
    ),
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
        if (count($data) != 32) {
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
    bullseye_leads_import($rows);
    //drupal_goto('/');
  }
  
}
