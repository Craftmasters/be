<div class="be-custom-template-form <?php print $fields_disabled; ?>">

  <?php if ($edit_contact_person) : ?>
    <div class="be-form-section edit-contact-person-header">
      <div class="row">
        
        <div class="col-xs-6 left">
          <h2><?php print $name; ?></h2>
          <h3><?php print $position; ?></h3>
        </div>
        <div class="col-xs-6 right">
          <img src="<?php print $profile_picture; ?>" class="prof-pic">
          <a href="#" class="edit-contact-toggle"><img src="<?php print $edit_icon; ?>"></a>
          <div class="field-cover"></div>
        </div>
      </div>
    </div>
  <?php endif; ?>

	<?php print render($form['form_title']); ?>
	<div class="be-form-section">
    <label><?php print t('Person Name'); ?></label>
    <div class="row">
      <div class="col-xs-4"><?php print render($form['firstname']); ?></div>
      <div class="col-xs-4"><?php print render($form['middlename']); ?></div>
      <div class="col-xs-4"><?php print render($form['lastname']); ?></div>
    </div>
  </div>
  <div class="be-form-single"><?php print render($form['company']); ?></div>
  <div class="be-form-section">
    <div class="row">
      <div class="col-xs-6"><?php print render($form['title']); ?></div>
      <div class="col-xs-6"><?php print render($form['contact_type']); ?></div>
    </div>
  </div>
  <div class="be-form-section">
    <div class="row">
      <div class="col-xs-6"><?php print render($form['owner']); ?></div>
      <div class="col-xs-6"><?php print render($form['business_type']); ?></div>
    </div>
  </div>
  <div class="be-form-single"><?php print render($form['work_email']); ?></div>
  <div class="be-form-single"><?php print render($form['work_phone']); ?></div>
  <div class="be-form-single"><?php print render($form['mobile_phone']); ?></div>
  <div class="be-form-single"><?php print render($form['work_website']); ?></div>
  <div class="be-form-single"><?php print render($form['linkedin']); ?></div>
  <div class="be-form-single"><?php print render($form['facebook']); ?></div>
  <div class="be-form-section">
  	<label><?php print t('Address'); ?></label>
    <div class="row">
      <div class="col-xs-12"><?php print render($form['address']); ?></div>
      <div class="col-xs-4"><?php print render($form['city']); ?></div>
      <div class="col-xs-4"><?php print render($form['field_states']); ?></div>
      <div class="col-xs-4"><?php print render($form['zip_code']); ?></div>
    </div>
  </div>
  <div class="be-form-single"><?php print render($form['visibility']); ?></div>
  <div class="be-form-single"><?php print render($form['field_tags']); ?></div>
  <div class="be-form-single"><?php print render($form['description']); ?></div>
  <?php print drupal_render_children($form); ?>
</div>

