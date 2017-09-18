<?php
/**
 * @file
 * bullseye_image_styles.features.inc
 */

/**
 * Implements hook_image_default_styles().
 */
function bullseye_image_styles_image_default_styles() {
  $styles = array();

  // Exported image style: profile_picture.
  $styles['profile_picture'] = array(
    'label' => 'Profile Picture',
    'effects' => array(
      1 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 250,
          'height' => 250,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}
