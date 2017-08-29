<div class="be-custom-template-form">

  <?php print render($form['form_title']); ?>
  <div class="be-form-section">
    <label><?php print t('Person Name'); ?></label>
    <div class="row">
      <div class="col-xs-4"><?php print render($form['field_firstname'][LANGUAGE_NONE][0]['value']); ?></div>
      <div class="col-xs-4"><?php print render($form['field_middle_name'][LANGUAGE_NONE][0]['value']); ?></div>
      <div class="col-xs-4"><?php print render($form['field_lastname'][LANGUAGE_NONE][0]['value']); ?></div>
    </div>
  </div>
  <div class="be-form-single"><?php print render($form['field_company']); ?></div>
  <div class="be-form-section">
    <div class="row">
      <div class="col-xs-6"><?php print render($form['field_title'][LANGUAGE_NONE][0]['value']); ?></div>
      <div class="col-xs-6"><?php print render($form['field_type'][LANGUAGE_NONE]); ?></div>
    </div>
  </div>
  <div class="be-form-section">
    <div class="row">
      <div class="col-xs-6"><?php print render($form['field_owned_by'][LANGUAGE_NONE][0]['value']); ?></div>
      <div class="col-xs-6"><?php print render($form['field_type_of_business'][LANGUAGE_NONE][0]['value']); ?></div>
    </div>
  </div>
  <div class="be-form-single"><?php print render($form['field_email']); ?></div>
  <div class="be-form-single"><?php print render($form['field_work_phone']); ?></div>
  <div class="be-form-single"><?php print render($form['field_personal_website']); ?></div>
  <div class="be-form-single"><?php print render($form['field_linkedin_personal']); ?></div>
  <div class="be-form-single"><?php print render($form['field_facebook_personal']); ?></div>
  <div class="be-form-single"><?php print render($form['field_tags']); ?></div>
</div>

<?php print render($form['field_contacts']); ?>

<div class="hidden-container">
  <?php print render($form['title']); ?>
</div>

<?php print drupal_render_children($form); ?>