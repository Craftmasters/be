<div class="current-progress-main" node-id="<?php print $nid; ?>">
	
	<div id="div-plan-specs" class="cp-step row <?php print $class_plan_specs; ?>">
		<div class="col-xs-2">
			<span class="indicator initial"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Plan Specification'); ?></span></a>
		</div>
	</div>

	<div id="div-request-specs" class="cp-step row <?php print $class_request_specs; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#request-specification">
				<span><?php print t('Request specifications'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-receive-plan" class="cp-step row <?php print $class_receive_plan; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#receive-plan-details">
				<span><?php print t('Receive plan details'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-rfp" class="cp-step row <?php print $class_rfp; ?>">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('RFP'); ?></span></a>
		</div>
	</div>

	<div id="div-generate-rfp" class="cp-step row <?php print $class_generate_rfp; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Generate RFP'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-receive-quote" class="cp-step row <?php print $class_recieve_quote; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Receive quote'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-plan-pres" class="cp-step row <?php print $class_plan_presentation; ?>">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Plan Presentation'); ?></span></a>
		</div>
	</div>

	<div id="div-request-info" class="cp-step row <?php print $class_request_info; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Request information'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-receive-feedback" class="cp-step row <?php print $class_receive_feedback; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link">
				<span><?php print t('Receive Feedback'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-convert-to-deals" class="cp-step row <?php print $class_convert_deals; ?>">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Convert to Deals in Progress'); ?></span></a>
		</div>
	</div>

	<div id="request-specification" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Request Specification'); ?></h3>
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
		      			<h3><?php print t('Send Plan Specification link via email?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button id="btn-save-exit-request-plan-specs" type="button" class="gray-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-send-link-plan-specs" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Send Link'); ?></button>
		        	<button id="btn-receive-details" type="button" class="green-btn" data-toggle="modal" data-target="#receive-plan-details" data-dismiss="modal"><?php print t('Next: Receive Details'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="receive-plan-details" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Receive Plan Details'); ?></h3>
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
		      			<h3><?php print t('Receive Plan Details'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button id="btn-save-exit-receive-details" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-next-generate-rfp" type="button" class="green-btn" data-dismiss="modal"><?php print t('Next: Generate RFP'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

</div>