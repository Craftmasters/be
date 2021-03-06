<?php if ($_GET['from'] == 'lead') : ?>

	<div class="be-header-progress">
	  <div class="be-progress be-start be-green">
	    <?php print t('Lead'); ?>
	  </div>
	  <div id="hp_verification" class="be-progress be-end be-blue">
	    <?php print t('Verification'); ?>
	  </div>
	  <div id="hp_convert_to_prospect" class="be-progress be-end be-gray">
	    <?php print t('Convert to Prospect'); ?>
	  </div>
	</div>

<?php elseif ($_GET['from'] == 'prospect') : ?>

	<div class="be-header-progress">
	  <div class="be-progress be-start be-green">
	    <?php print t('Prospect'); ?>
	  </div>
	  <div id="hp_engagement" class="be-progress be-end be-blue">
	    <?php print t('Engagement'); ?>
	  </div>
	  <div id="hp_convert_to_opportunity" class="be-progress be-end be-gray">
	    <?php print t('Convert to Opportunity'); ?>
	  </div>
	</div>

<?php elseif ($_GET['from'] == 'opportunity') : ?>

	<div class="be-header-progress">
	  <div class="be-progress be-start be-green">
	    <?php print t('Opportunity'); ?>
	  </div>
	  <div id="hp_plan_specification" class="be-progress be-end be-blue">
	    <?php print t('Plan Specification'); ?>
	  </div>
	  <div id="hp_rfp" class="be-progress be-end be-gray">
	    <?php print t('RFP'); ?>
	  </div>
	  <div id="hp_plan_presentation" class="be-progress be-end be-gray">
	    <?php print t('Plan Presentation'); ?>
	  </div>
	  <div id="hp_convert_to_deal" class="be-progress be-end be-gray">
	    <?php print t('Convert to Deal in Progress'); ?>
	  </div>
	</div>

<?php elseif ($_GET['from'] == 'deal_in_progress') : ?>

	<div class="be-header-progress">
	  <div class="be-progress be-start be-green">
	    <?php print t('Deal in Progress'); ?>
	  </div>
	  <div id="hp_gta" class="be-progress be-end be-blue">
	    <?php print t('Generate Trust Agreement'); ?>
	  </div>
	  <div id="hp_poa" class="be-progress be-end be-gray">
	    <?php print t('Proof of Agreement'); ?>
	  </div>
	  <div id="hp_ctcd" class="be-progress be-end be-gray">
	    <?php print t('Convert to Closed Deal'); ?>
	  </div>
	</div>

<?php elseif ($_GET['from'] == 'closed_deal') : ?>

	<div class="be-header-progress">
	  <div class="be-progress be-start be-green">
	    <?php print t('Closed Deal'); ?>
	  </div>
	  <div id="hp_migration" class="be-progress be-end be-blue">
	    <?php print t('Migration'); ?>
	  </div>
	  <div id="hp_congrats" class="be-progress be-end be-gray">
	    <?php print t('Congratulations!'); ?>
	  </div>
	</div>


<?php endif;?>