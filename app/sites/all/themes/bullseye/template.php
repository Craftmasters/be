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

  $plan_specs = (arg(0) == 'plan_specs');
  if($plan_specs){
    $variables['classes_array'][] = 'plan-specs-form';
  }

  // For Dashboard page.
  if (drupal_is_front_page()) {
    if (user_is_logged_in()) {
      $variables['classes_array'][] = 'dashboard';
    }
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
  global $base_url;

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

  // For Dashboard page.
  if (drupal_is_front_page()) {
    if (user_is_logged_in()) {
      hide($vars['page']['content']['system_main']['default_message']);
      drupal_add_js($theme_directory . '/js/Chart.bundle.min.js');
      drupal_add_js($theme_directory . '/js/d3.min.js');
      drupal_add_js($theme_directory . '/js/d3pie.min.js');
      drupal_add_js($theme_directory . '/js/countUp.js');
    }
  }

  // Add datepicker library for create event block.
  $adminimal_directory = drupal_get_path('theme', 'adminimal');

  // Firefox doesn't support html5 date input.
  // So we are using jquery datepicker for date fields.
  drupal_add_library('system', 'ui.datepicker');
  drupal_add_css($adminimal_directory . '/css/jquery.ui.theme.css');

  // For suggestion box image.
  $vars['suggestion_box_img'] = $base_url . '/' . $theme_directory . '/images/suggestion-box.svg';

  // Add Vuejs library.
  drupal_add_js('https://unpkg.com/vue@2.4.4/dist/vue.js', 'external');
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
      $lang = LANGUAGE_NONE;
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
      //hide($form['additional_settings']);
      hide($form['actions']['preview']);
      $form['actions']['cancel'] = array(
        '#markup' => '<a class="gray-btn" href="/" onClick="parent.Lightbox.end();">Cancel</a>',
      );

      if (isset($_GET['account_status']) && $_GET['account_status'] == 'prospect') {
        $form['field_account_status'][$lang]['#default_value'][0] = 'prospect';
      }

      $form['title']['#required'] = FALSE;
      $form['field_firstname'][$lang][0]['value']['#title'] = '';
      $form['field_firstname'][$lang][0]['value']['#attributes']['placeholder'] = t('First Name');
      $form['field_middle_name'][$lang][0]['value']['#title'] = '';
      $form['field_middle_name'][$lang][0]['value']['#attributes']['placeholder'] = t('Middle Name');
      $form['field_lastname'][$lang][0]['value']['#title'] = '';
      $form['field_lastname'][$lang][0]['value']['#attributes']['placeholder'] = t('Last Name');
      $form['field_company'][$lang][0]['value']['#attributes']['placeholder'] = t('Add Company');
      $form['field_title'][$lang][0]['value']['#attributes']['placeholder'] = t('Add Title');
      $form['field_owned_by'][$lang][0]['value']['#attributes']['placeholder'] = t('Add Owner');
      $form['field_email'][$lang][0]['value']['#attributes']['placeholder'] = t('Add Email');
      $form['field_work_phone'][$lang][0]['value']['#attributes']['placeholder'] = t('Add Phone');
      $form['field_personal_website'][$lang][0]['value']['#attributes']['placeholder'] = t('Add Website');
      $form['field_linkedin_personal'][$lang][0]['value']['#attributes']['placeholder'] = t('Add Social');
      $form['field_facebook_personal'][$lang][0]['value']['#attributes']['placeholder'] = t('Add Social');
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
  $items['bullseye_plan_specs_form'] = array(
    'render element' => 'form',
    'template' => 'plan-specs-add',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  $items['bullseye_producer_acct_indiv_form'] = array(
    'render element' => 'form',
    'template' => 'producer-acct',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  $items['bullseye_producer_acct_company_form'] = array(
    'render element' => 'form',
    'template' => 'producer-acct',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );
  $items['bullseye_account_new_form'] = array(
    'render element' => 'form',
    'template' => 'add-new-account-form',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/forms',
  );

  // pages
  $items['bullseye_producer_acct_select'] = array(
    'template' => 'page--producer-acct-select',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/pages',
  );
  $items['bullseye_producer_acct_confirm'] = array(
    'template' => 'page--producer-acct-confirm',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/pages',
  );
  $items['producer_file_browser'] = array(
    'template' => 'page--producer-file-page',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates/pages',
  );
  $items['bullseye_producer_file_directory'] = array(
    'template' => 'producer-file-directory-tree',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates',
  );
  $items['bullseye_producer_file_files_table'] = array(
    'template' => 'producer-file-table',
    'path' => drupal_get_path('theme', 'bullseye') . '/templates',
  );
  return $items;
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

    $fcid = $account->field_contacts[LANGUAGE_NONE][0]['value'];
    $contact = field_collection_item_load($fcid);

    $vars['company'] = $account->title;

    if (isset($contact->field_email[LANGUAGE_NONE][0]['value'])) {
      $vars['email'] = $contact->field_email[LANGUAGE_NONE][0]['value'];
    }
    if (isset($account->field_work_phone[LANGUAGE_NONE])) {
      $vars['phone'] = $account->field_work_phone[LANGUAGE_NONE][0]['value'];
    }
    if (isset($account->field_work_website[LANGUAGE_NONE])) {
      $vars['website'] = $account->field_work_website[LANGUAGE_NONE][0]['value'];
    }

    // Address
    if (isset($account->field_street[LANGUAGE_NONE])) {
      $vars['street'] = $account->field_street[LANGUAGE_NONE][0]['value'];
    }
    if (isset($account->field_city[LANGUAGE_NONE])) {
      $vars['city'] = $account->field_city[LANGUAGE_NONE][0]['value'];
    }
    if (isset($account->field_state_code[LANGUAGE_NONE])) {
      $vars['state'] = $account->field_state_code[LANGUAGE_NONE][0]['value'];
    }
    if (isset($account->field_postal_code[LANGUAGE_NONE])) {
      $vars['code'] = $account->field_postal_code[LANGUAGE_NONE][0]['value'];
    }
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

/**
 * Implements template_preprocess_THEME().
 */
function bullseye_preprocess_be_rfps(&$vars) {
  drupal_add_js(drupal_get_path('module', 'bullseye_rfp') . '/lib/sorttable.js');
}

/**
 * Implements template_preprocess_THEME().
 */
function bullseye_preprocess_be_prospects(&$vars) {
  drupal_add_js(drupal_get_path('module', 'bullseye_rfp') . '/lib/sorttable.js');
}

/**
 * Implements template_preprocess_THEME().
 */
function bullseye_preprocess_be_leads(&$vars) {
  drupal_add_js(drupal_get_path('module', 'bullseye_rfp') . '/lib/sorttable.js');
}

/**
 * Implements template_preprocess_THEME().
 */
function bullseye_preprocess_be_carriers(&$vars) {
  drupal_add_js(drupal_get_path('module', 'bullseye_rfp') . '/lib/sorttable.js');
}
