<?php
/**
 * @file
 * context_layout.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function context_layout_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'sitewide_blocks';
  $context->description = 'Blocks that are seen on all pages.';
  $context->tag = 'Blocks';
  $context->conditions = array(
    'sitewide' => array(
      'values' => array(
        1 => 1,
      ),
    ),
  );
  $context->reactions = array();
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Blocks');
  t('Blocks that are seen on all pages.');
  $export['sitewide_blocks'] = $context;

  return $export;
}
