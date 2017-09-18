<div class="be-regular-block">
  <h2 class="be-regular-h2"><?php print t('Account Details'); ?></h2>
  <a href="/edit/account-details/<?php print $nid; ?>" class="edit-link edit-account-details" rel="lightframe"><img src="<?php print $edit_icon; ?>"></a>
  <div class="be-block-main">

  	<div class="be-view-field">
  		<div class="be-view-label"><?php print t('Company Name'); ?></div>
	  	<div class="be-view-value font-bold"><?php print $company_name; ?></div>
  	</div>
	  
	  <div class="be-view-field">
  		<div class="be-view-label"><?php print t('Primary Email Address'); ?></div>
	  	<div class="be-view-value">
	  		<a href="mailto:info@abccompany.com" class="orange-font"><?php print $primary_email; ?></a>
	  	</div>
  	</div>

  	<div class="be-view-field">
  		<div class="be-view-label"><?php print t('Phone Number'); ?></div>
	  	<div class="be-view-value"><a href="tel:<?php print $phone_number; ?>"><?php print $phone_number; ?></a></div>
  	</div>

  	<?php if ($website != '') : ?>
  		<div class="be-view-field">
	  		<div class="be-view-label"><?php print t('Website'); ?></div>
		  	<div class="be-view-value">
		  		<a href="<?php print $website; ?>" target="_blank" class="orange-font"><?php print $website; ?></a>
		  	</div>
	  	</div>
  	<?php endif; ?>

  	<div class="be-view-field">
  		<div class="be-view-label"><?php print t('Company Street Address'); ?></div>
	  	<div class="be-view-value"><?php print $street_address; ?></div>
  	</div>

  	<div class="be-view-field-row row">

  		<div class="col-xs-4">
  			<div class="be-view-field">
		  		<div class="be-view-label"><?php print t('City'); ?></div>
			  	<div class="be-view-value"><?php print $city; ?></div>
		  	</div>
	  	</div>

  		<div class="col-xs-4">
  			<div class="be-view-field">
		  		<div class="be-view-label"><?php print t('State'); ?></div>
			  	<div class="be-view-value"><?php print $state; ?></div>
		  	</div>
	  	</div>

	  	<div class="col-xs-4">
  			<div class="be-view-field">
		  		<div class="be-view-label"><?php print t('Zip Code'); ?></div>
			  	<div class="be-view-value"><?php print $zip_code; ?></div>
		  	</div>
	  	</div>

  	</div>

  	<div class="be-view-field-row row">
  		<div class="col-xs-12">
  			<div class="be-view-field">
		  		<div class="be-view-label"><?php print t('Business Type'); ?></div>
			  	<div class="be-view-value"><?php print $business_type; ?></div>
		  	</div>
	  	</div>
  	</div>

  	<div class="be-view-field">
  		<div class="be-view-label"><?php print t('Tags'); ?></div>
	  	<div class="be-view-value"><?php print $tags; ?></div>
  	</div>

  </div>
</div>