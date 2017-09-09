<?php print render($form['form_title']); ?>

<div class="be-form-single"><?php print render($form['type']); ?></div>

<div class="be-form-single"><?php print render($form['company']); ?></div>

<div class="be-form-section">
	<label class="select-benefit-label"><?php print t('Primary Contact'); ?></label>
	<div class="row">
		<div class="col-xs-6"><?php print render($form['firstname']); ?></div>
		<div class="col-xs-6"><?php print render($form['lastname']); ?></div>
	</div>
</div>

<div class="be-form-single"><?php print render($form['primary_contact_email']); ?></div>

<div class="be-form-section select-benefits-container">
	<div class="row">
		<div class="col-xs-6"><?php print render($form['phone']); ?></div>
		<div class="col-xs-6"><?php print render($form['website']); ?></div>
	</div>
</div>

<?php foreach ($form['attachments_container']['attachment'] as $key => $value) : ?>
  <?php if ($key[0] != '#') : ?>
    <div class="be-form-single">
    	<?php print render($form['attachments_container']['attachment'][$key]); ?>
    </div>
  <?php endif; ?>
<?php endforeach; ?>

<?php print render($form['submit_container']); ?>

<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>

