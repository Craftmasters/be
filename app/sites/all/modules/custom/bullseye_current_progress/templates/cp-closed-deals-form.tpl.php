<div class="current-progress-main" node-id="<?php print $nid; ?>">
	
	<div id="div-plan-specs" class="cp-step row green-check">
		<div class="col-xs-2">
			<span class="indicator initial"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Migration'); ?></span></a>
		</div>
	</div>

	<div id="div-request-specs" class="cp-step row done-step">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10" style="position:relative;">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#setup-account">
				<span><?php print t('Setup Account'); ?></span>
			</a>
			<a href="https://arrow.archerjordan.com/" class="secondary-link">https://arrow.archerjordan.com/</a>
		</div>
	</div>

	<div id="div-convert-to-deals" class="cp-step row green-check">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step">
				<span><?php print t('Congratulations! You\'ve successfully migrated ABC Company!'); ?></span>
			</a>
		</div>
	</div>

	<div id="setup-account" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Setup account'); ?></h3>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner setup-account">
		      			<h3><?php print t('You are almost done! Prepare the following to setup the account in Arrow Cloud.'); ?></h3>
		      			<div class="row prepare-docs">
		      				<div class="col-xs-5 left"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
		      				<div class="col-xs-7 right">
		      					<h2>Benefit Setup document.</h2>
		      					<?php if (!empty($benefit_template)) : ?>
		      						<a href="<?php print $benefit_template; ?>" download>
		      							<?php print t('Click here for the template.'); ?>	
		      						</a>
		      					<?php endif; ?>
		      				</div>
		      			</div>
		      			<div class="row prepare-docs">
		      				<div class="col-xs-5 left"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
		      				<div class="col-xs-7 right">
		      					<h2>Payable Setup document</h2>
		      					<?php if (!empty($payable_template)) : ?>
		      						<a href="<?php print $payable_template; ?>" download>
		      							<?php print t('Click here for the template.'); ?>	
		      						</a>
		      					<?php endif; ?>
		      				</div>
		      			</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" data-dismiss="modal"><?php print t('Cancel'); ?></button>
		        	<button type="button" class="green-btn" data-toggle="modal" data-target="#migrate-to-arrow" data-dismiss="modal"><?php print t('Next'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="migrate-to-arrow" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Setup account'); ?></h3>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Migrate account details to Arrow Cloud?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#setup-account" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button type="button" class="green-btn" data-toggle="modal" data-target="#migrate-to-arrow-1" data-dismiss="modal"><?php print t('Next'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="migrate-to-arrow-1" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Setup account'); ?></h3>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Using your admin credentials, log-in to Arrow Cloud to finish account setup:'); ?></h3>
		      			<a class="arrow-link" href="https://arrow.archerjordan.com/" target="_blank">https://arrow.archerjordan.com/</a>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#migrate-to-arrow" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button type="button" class="green-btn" data-toggle="modal" data-target="#migrate-success" data-dismiss="modal"><?php print t('Done'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="migrate-success" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Setup account'); ?></h3>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Congratulations! You have successfully enrolled an account in Arrow Cloud.'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-dismiss="modal"><?php print t('Close'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

</div>

<?php print drupal_render_children($form); ?>