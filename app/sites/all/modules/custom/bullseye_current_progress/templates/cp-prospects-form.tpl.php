<div class="current-progress-main" node-id="<?php print $nid; ?>">
	
	<div class="cp-step row <?php print $class_engagement; ?>">
		<div class="col-xs-2">
			<span class="indicator initial"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step">
				<span><?php print t('Engagement'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_send_email_campaign; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Send email campaign'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_build_rapport; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#build-rapport">
				<span><?php print t('Build Rapport'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_receive_feedback; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#prospect-insterested">
				<span><?php print t('Receive Feedback'); ?></span>	
			</a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_convert_to_opportunity; ?>">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<?php if ($account_status == 'opportunity') : ?>
				<a href="#" class="cp-link big-step">
					<span><?php print t('Converted to Opportunity!'); ?></span>
				</a>
				<a href="/company/<?php print arg(1); ?>?from=opportunity" class="cp-link orange">
					<span><?php print t('Go to Opportunity Page'); ?></span>
				</a>
			<?php else: ?>
				<a href="#" class="cp-link big-step" data-toggle="modal" data-target="#convert-to-opportunity">
					<span><?php print t('Convert to Opportunity'); ?></span>
				</a>
			<?php endif; ?>
		</div>
	</div>

	<div id="build-rapport" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Build Rapport'); ?></h3>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
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
		      			<h3><?php print t('Call client to build rapport.'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-receive-feedback" type="button" class="green-btn" data-toggle="modal" data-target="#prospect-insterested" data-dismiss="modal"><?php print t('Next: Receive Feedback'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="prospect-insterested" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Receive Feedback'); ?></h3>
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
		      			<h3><?php print t('Is the prospect interested?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button id="btn-convert-to-opportunity" type="button" class="green-btn" data-toggle="modal" data-target="#convert-to-opportunity" data-dismiss="modal"><?php print t('Yes'); ?></button>
		        	<button type="button" class="gray-btn" data-dismiss="modal"><?php print t('No'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="convert-to-opportunity" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Convert'); ?></h3>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Convert to Opportunity?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<?php print render($form['submit']); ?>
		        	<button type="button" class="gray-btn" data-dismiss="modal"><?php print t('Not Now'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

</div>

	

<?php print drupal_render_children($form); ?>