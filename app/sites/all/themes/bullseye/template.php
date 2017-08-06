<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

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
}