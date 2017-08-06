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
  if ($login_page || $forgot_password) {
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
  global $base_url;
  
  // Theme directory.
  $theme_directory = path_to_theme('theme', 'bullseye');

  // Archerjordan logo.
  $vars['archerjordan_logo'] = $base_url . '/' . $theme_directory . '/archerjordan-logo.svg';

  // Check if page is login and fogot password.
  $vars['login'] = FALSE;
  $login_page = (arg(0) == 'user' && arg(1) == 'login'  && !user_is_logged_in());
  $forgot_password = (arg(0) == 'user' && arg(1) == 'password' && !user_is_logged_in());
  if ($login_page || $forgot_password) {
    $vars['login'] = TRUE;
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
      break;
    default:
      break;
  }
}