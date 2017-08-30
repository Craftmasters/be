<div class="current-progress-main">
	
	<div class="cp-step row gray-check">
		<div class="col-xs-2">
			<span class="indicator initial"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step">
				<span><?php print t('Engagement'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row current-step">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Send email campaign'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Send newsletter'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Receive Feedback'); ?></span>	
			</a>
		</div>
	</div>

	<div class="cp-step row no-check">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step">
				<span><?php print t('Convert to Opportunities'); ?></span>
			</a>
		</div>
	</div>
</div>

<?php print drupal_render_children($form); ?>