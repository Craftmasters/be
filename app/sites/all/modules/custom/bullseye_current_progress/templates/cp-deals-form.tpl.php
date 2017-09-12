<div class="current-progress-main" node-id="<?php print $nid; ?>">
	
	<div id="div-gta" class="cp-step row gray-check">
		<div class="col-xs-2">
			<span class="indicator initial"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Generate Trust Agreement'); ?></span></a>
		</div>
	</div>

	<div id="div-dd" class="cp-step row current-step">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" >
				<span><?php print t('Draw documents'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-gsfi" class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" >
				<span><?php print t('Generate set-up fee invoice'); ?></span>
			</a>
		</div>
	</div>
	
	<div id="div-sd" class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator "></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" >
				<span><?php print t('Send documents'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-poa" class="cp-step row gray-check">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Proof of Agreement'); ?></span></a>
		</div>
	</div>

	<div id="div-rsd" class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" >
				<span><?php print t('Receive signed documents'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-cp" class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" >
				<span><?php print t('Collect Premium'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-ctcd" class="cp-step row no-check">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">

			<?php if ($account_status != 'lead' && $account_status != 'prospect' && $account_status != 'opportunity' && $account_status != 'deal_in_progress') : ?>
				<a href="#" class="cp-link big-step">
					<span><?php print t('Converted to Closed Deal!'); ?></span>
				</a>
				<a href="/company/<?php print arg(1); ?>?from=closed-deal" class="cp-link orange">
					<span><?php print t('Go to Closed Deal Page'); ?></span>
				</a>
			<?php else: ?>
				<a href="#" class="cp-link big-step"><span><?php print t('Convert to Closed Deal'); ?></span></a>
			<?php endif; ?>
			
		</div>
	</div>

</div>

<?php print drupal_render_children($form); ?>