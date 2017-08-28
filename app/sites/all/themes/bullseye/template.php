<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

/**
 * Override or insert variables into the html templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function bullseye_preprocess_html(&$variables, $hook) {
  global $base_url;
  global $user;

  // Add a class based on role on body element.
  foreach ($user->roles as $role) {
    $variables['classes_array'][] = drupal_html_class($role);
  }

  // Add class to login and forgot password page.
  $login_page = (arg(0) == 'user' && arg(1) == 'login' && !user_is_logged_in());
  $forgot_password = (arg(0) == 'user' && arg(1) == 'password' && !user_is_logged_in());
  $pass_reset = (arg(0) == 'user' && arg(1) == 'reset' && !user_is_logged_in());
  if ($login_page || $forgot_password || $pass_reset) {
    $variables['classes_array'][] = 'login';
  }

}

/**
 * Override or insert variables into the page templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function bullseye_preprocess_page(&$vars, $hook) {
  global $base_url; //krumo(node_load(5321));

  // Theme directory.
  $theme_directory = path_to_theme('theme', 'bullseye');

  // Archerjordan logo.
  $vars['archerjordan_logo'] = $base_url . '/' . $theme_directory . '/archerjordan-logo.svg';

  // Check if page is login and fogot password.
  $vars['login'] = FALSE;
  $login_page = (arg(0) == 'user' && arg(1) == 'login'  && !user_is_logged_in());
  $forgot_password = (arg(0) == 'user' && arg(1) == 'password' && !user_is_logged_in());
  $pass_reset = (arg(0) == 'user' && arg(1) == 'reset' && !user_is_logged_in());
  if ($login_page || $forgot_password || $pass_reset) {
    $vars['login'] = TRUE;
  }

  $theme_suggestion_last = 'page';
  $vars['column'] = 'one-col';

  foreach ($vars['theme_hook_suggestions'] as $key => $value) {
    $theme_suggestion_last = $value;
  }

  if ($theme_suggestion_last == 'two_column') {
    $vars['column'] = 'two-col';
  }

  if ($theme_suggestion_last == 'three_column') {
    $vars['column'] = 'three-col';
  }

  if ($theme_suggestion_last == 'four_column') {
    $vars['column'] = 'four-col';
  }

  if ($theme_suggestion_last == 'five_five_two_column') {
    $vars['column'] = 'five-five-two-col';
  }

  if ($theme_suggestion_last == 'four_eight_column') {
    $vars['column'] = 'four-eight-col';
  }

  if (arg(0) == 'rfps' && arg(1) == 'add') {
    drupal_add_js($theme_directory . '/js/smk-accordion.min.js');
  }

}

/**
 * Implements hook_form_alter().
 */
function bullseye_form_alter(&$form, &$form_state, $form_id) {
  global $user;

  $administrator = (is_array($user->roles) && in_array('administrator', array_values($user->roles)));
  $admin = (is_array($user->roles) && in_array('admin', array_values($user->roles)));

  switch ($form_id) {
    case 'user_login':
      // Modify form placeholders for login fields.
      $form['name']['#description'] = '';
      $form['name']['#title'] = '';
      $form['name']['#attributes']['placeholder'] = t('Username');
      $form['pass']['#description'] = '';
      $form['pass']['#title'] = '';
      $form['pass']['#attributes']['placeholder'] = t('Password');
      $form['forgot'] = array(
        '#markup' => '<a href="/user/password" class="forgot-pass">' . t('Forgot Password?') . '</a>',
        '#weight' => 1000,
      );
      break;
    case 'user_pass':
      $form['name']['#attributes']['placeholder'] = t('Enter your email or username');
      break;
    case 'accounts_node_form':
      $form['#attributes']['class'][] = 'be-forms be-forms-default';
      $form_title = t('Add Account');
      if (isset($_GET['account_status'])) {
        if ($_GET['account_status'] == 'lead') {
          $form_title = t('Add New Lead');
        }
      }
      $form['form_title'] = array(
        '#prefix' => '<div class="form-title">',
        '#suffix' => '</div>',
        '#markup' => '<h2>' . $form_title . '</h2>',
        '#weight' => -100,
      );
      hide($form['additional_settings']);
      hide($form['actions']['preview']);
      $form['actions']['cancel'] = array(
        '#markup' => '<a class="gray-btn" href="/" onClick="parent.Lightbox.end();">Cancel</a>',
      );

      $form['title']['#required'] = FALSE;
      $form['field_firstname'][LANGUAGE_NONE][0]['value']['#title'] = '';
      $form['field_firstname'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('First Name');
      $form['field_middle_name'][LANGUAGE_NONE][0]['value']['#title'] = '';
      $form['field_middle_name'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Middle Name');
      $form['field_lastname'][LANGUAGE_NONE][0]['value']['#title'] = '';
      $form['field_lastname'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Last Name');
      $form['field_company'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Add Company');
      $form['field_title'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Add Title');
      $form['field_owned_by'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Add Owner');
      $form['field_email'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Add Email');
      $form['field_work_phone'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Add Phone');
      $form['field_personal_website'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Add Website');
      $form['field_linkedin_personal'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Add Social');
      $form['field_facebook_personal'][LANGUAGE_NONE][0]['value']['#attributes']['placeholder'] = t('Add Social');
      $form['#validate'][] = '_make_title_from_person_name';
      break;
    case 'bullseye_rfp_initial_add_form':
      break;
    case 'bullseye_rfp_form':
      break;
    default:
      break;
  }
}

/**
 * Implements hook_theme().
 */
function bullseye_theme($existing, $type, $theme, $path) {
  $items['accounts_node_form'] = array(
    'render element' => 'form',
    'template' => 'accounts-node-form',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  $items['bullseye_rfp_initial_add_form'] = array(
    'render element' => 'form',
    'template' => 'rfp-initial-add-form',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  $items['bullseye_rfp_form'] = array(
    'render element' => 'form',
    'template' => 'rfp-add-form',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  $items['bullseye_carriers_form'] = array(
    'render element' => 'form',
    'template' => 'carrier-add-form',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  $items['bullseye_proposals_form'] = array(
    'render element' => 'form',
    'template' => 'proposals-add-form',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  $items['bullseye_producer_form'] = array(
    'render element' => 'form',
    'template' => 'producer-add-form',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  return $items;
}

/**
 * Make title from person name.
 */
function _make_title_from_person_name($form, &$form_state) {
  $form_state['redirect'] = FALSE;
  $firstname = $form_state['values']['field_firstname'][LANGUAGE_NONE][0]['value'];
  $middlename = $form_state['values']['field_middle_name'][LANGUAGE_NONE][0]['value'];
  $lastname = $form_state['values']['field_lastname'][LANGUAGE_NONE][0]['value'];

  if ($firstname == '' || $lastname == '') {
    form_set_error('form', t('First Name and Last Name field is required.'));
  }
  else {
    $form_state['values']['title'] = $firstname . ' ' . $lastname;
    if ($middlename != '') {
      $form_state['values']['title'] = $firstname . ' ' . $middlename . ' ' . $lastname;
    }
  }
}

/**
 * Implements theme_preprocess_hook().
 */
function bullseye_preprocess_bullseye_rfp_form(&$vars) {
  global $base_url;

  // Initialize variables placeholder.
  $vars['company'] = '';
  $vars['email'] = '';
  $vars['phone'] = '';
  $vars['website'] = '';

  // Address
  $vars['street'] = '';
  $vars['city'] = '';
  $vars['state'] = '';
  $vars['code'] = '';

  if (isset($_SESSION['add_rfp'])) {
    $data = $_SESSION['add_rfp'];
    $account = node_load($data['account_id']);

    $vars['company'] = $account->field_company[LANGUAGE_NONE][0]['value'];
    $vars['email'] = $account->field_email[LANGUAGE_NONE][0]['value'];
    $vars['phone'] = $account->field_work_phone[LANGUAGE_NONE][0]['value'];
    $vars['website'] = $account->field_work_website[LANGUAGE_NONE][0]['value'];

    // Address
    $vars['street'] = $account->field_street[LANGUAGE_NONE][0]['value'];
    $vars['city'] = $account->field_city[LANGUAGE_NONE][0]['value'];
    $vars['state'] = $account->field_state_code[LANGUAGE_NONE][0]['value'];
    $vars['code'] = $account->field_postal_code[LANGUAGE_NONE][0]['value'];
  }

  $theme_directory = path_to_theme('theme', 'bullseye');
  $vars['edit_icon'] = $base_url . '/' . $theme_directory . '/images/icons/be_edit_details.svg';
  $vars['pdf_logo'] = $base_url . '/' . $theme_directory . '/images/archer-pdf-logo.png';

  $vars['bt'] = array();
  $vars['bt']['title_major_medical'] = 'Major Medical';
  $vars['bt']['title_limited_medical'] = 'Limited Medical';
  $vars['bt']['title_teledoc'] = 'Telemedicine';
  $vars['bt']['title_mec'] = 'MEC';
  $vars['bt']['title_life'] = 'Life & AD&D';
  $vars['bt']['title_short_term_disability'] = 'Short Term Disability';
  $vars['bt']['title_dental'] = 'Dental';
  $vars['bt']['title_vision'] = 'Vision';
  $vars['bt']['title_retirement'] = 'Retirement';
  $vars['bt']['title_special_benefits'] = 'Special Benefits';
}

function MODULE_NAME_custom_theme() {
  if (current_path() == 'system/ajax') {
    return variable_get('admin_theme');
  }
}
