<div class="current-progress-main" node-id="<?php print $nid; ?>">
	
	<div id="div-plan-specs" class="cp-step row gray-check">
		<div class="col-xs-2">
			<span class="indicator initial"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Migration'); ?></span></a>
		</div>
	</div>

	<div id="div-request-specs" class="cp-step row current-step">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Setup Account at Arrow Cloud'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-convert-to-deals" class="cp-step row no-check">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step">
				<span><?php print t('Migrated to Arrow Cloud'); ?></span>
			</a>
		</div>
	</div>

</div>

<?php print drupal_render_children($form); ?>