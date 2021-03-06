<?php print render($form['form_title']); ?>

<div class="be-form-single"><?php print render($form['carrier_name']); ?></div>
<div class="be-form-single"><?php print render($form['primary_contact_name']); ?></div>

<div class="be-form-section">
	<div class="row">
	  <div class="col-xs-6"><?php print render($form['primary_contact_email']); ?></div>
	  <div class="col-xs-6"><?php print render($form['contact_number']); ?></div>
	</div>
</div>

<div class="be-form-single"><?php print render($form['address']); ?></div>

<div class="be-form-section select-benefits-container">
	<label class="select-benefit-label"><?php print t('Benefit Offerings'); ?></label>
	<div class="row">
	  <?php foreach ($form['benefits_container']['benefits'] as $key => $value) : ?>
	    <?php if ($key[0] != '#') : ?>
	      <div class="col-xs-6">
	        <?php print render($form['benefits_container']['benefits'][$key]); ?>
	        <?php if ($key == 'special_benefits') : ?>
	        	<?php print render($form['special_benefits_text']); ?>
	        <?php endif; ?>
	      </div>
	    <?php endif; ?>
	  <?php endforeach; ?>
	</div>
</div>

<?php print render($form['submit_container']); ?>

<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>