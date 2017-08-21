<div class="row">
	<div class="col-md-4">
		<div class="be-regular-block">
		  <h2 class="be-regular-h2"><?php print t('Group Information'); ?></h2>
		  <a href="#" class="edit-link edit-account-details"><img src="<?php print $edit_icon; ?>"></a>
		  <div class="be-block-main">

		  	<div class="be-view-field">
		  		<div class="be-view-label"><?php print t('Company Name'); ?></div>
			  	<div class="be-view-value font-bold">ABC Company</div>
		  	</div>
			  
			  <div class="be-view-field">
		  		<div class="be-view-label"><?php print t('Primary Email Address'); ?></div>
			  	<div class="be-view-value">
			  		<a href="mailto:info@abccompany.com" class="orange-font">info@abccompany.com</a>
			  	</div>
		  	</div>

		  	<div class="be-view-field">
		  		<div class="be-view-label"><?php print t('Phone Number'); ?></div>
			  	<div class="be-view-value"><a href="tel:4513554776">(451) 355-4776</a></div>
		  	</div>

		  	<div class="be-view-field">
		  		<div class="be-view-label"><?php print t('Website'); ?></div>
			  	<div class="be-view-value">
			  		<a href="#" class="orange-font">https://abccompany.com</a>
			  		</div>
		  	</div>

		  	<div class="be-view-field">
		  		<div class="be-view-label"><?php print t('Company Street Address'); ?></div>
			  	<div class="be-view-value">888 19th Street</div>
		  	</div>

		  	<div class="be-view-field-row row">

		  		<div class="col-xs-4">
		  			<div class="be-view-field">
				  		<div class="be-view-label"><?php print t('City'); ?></div>
					  	<div class="be-view-value">San Antonio</div>
				  	</div>
			  	</div>

		  		<div class="col-xs-4">
		  			<div class="be-view-field">
				  		<div class="be-view-label"><?php print t('State'); ?></div>
					  	<div class="be-view-value">TX</div>
				  	</div>
			  	</div>

			  	<div class="col-xs-4">
		  			<div class="be-view-field">
				  		<div class="be-view-label"><?php print t('Zip Code'); ?></div>
					  	<div class="be-view-value">88888</div>
				  	</div>
			  	</div>

		  	</div>

		  </div>
		</div>

		<div class="be-regular-block">
			<h2 class="be-regular-h2"><?php print t('Plan Specifications'); ?></h2>
			<a href="#" class="edit-link edit-account-details"><img src="<?php print $edit_icon; ?>"></a>
			<div class="be-block-main plan-specification">
				<div class="be-form-section">
			    <div class="row">
			      <div class="col-xs-6"><?php print render($form['fringe_rates']); ?></div>
			      <div class="col-xs-6"><?php print render($form['proposed_effective_date']); ?></div>
			    </div>
			  </div>
			  <div class="be-form-single"><?php print render($form['other_work_locations']); ?></div>
			  <div class="be-form-section">
			    <div class="row">
			      <div class="col-xs-6"><?php print render($form['number_of_employees']); ?></div>
			      <div class="col-xs-6"><?php print render($form['number_of_dependents']); ?></div>
			    </div>
			  </div>
			  <div class="be-form-section">
			    <div class="row">
			      <div class="col-xs-6"><?php print render($form['nature_of_business']); ?></div>
			      <div class="col-xs-6"><?php print render($form['years_in_business']); ?></div>
			    </div>
			  </div>
			  <div class="be-form-section">
			    <div class="row">
			      <div class="col-xs-6"><?php print render($form['tax_id']); ?></div>
			      <div class="col-xs-6"><?php print render($form['renewal_date']); ?></div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="be-regular-block">
			<h2 class="be-regular-h2"><?php print t('Benefits'); ?></h2>
			<a href="#" class="edit-link edit-account-details"><img src="<?php print $edit_icon; ?>"></a>
		</div>

	</div>
	<div class="col-md-4">
		<div class="be-regular-block">
			<h2 class="be-regular-h2"><?php print t('Attachments'); ?></h2>
		</div>

		<div class="be-regular-block">
			<h2 class="be-regular-h2"><?php print t('Census Must Include The Following:'); ?></h2>
		</div>
	</div>
</div>

<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>

