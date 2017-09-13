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
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_rs; ?>" data-target="#request-specification">
				<span><?php print t('Request specifications'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-receive-plan" class="cp-step row <?php print $class_receive_plan; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_rp; ?>" data-target="#receive-plan-details">
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
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_gr; ?>" data-target="#generate-rfp">
				<span><?php print t('Generate RFP'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-receive-quote" class="cp-step row <?php print $class_recieve_quote; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_rq; ?>" data-target="#receive-quote">
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

	<div id="div-send-proposal" class="cp-step row <?php print $class_send_proposal; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_sp; ?>" data-target="#send-plan-proposal">
				<span><?php print t('Send Plan Proposal'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-receive-feedback" class="cp-step row <?php print $class_receive_feedback; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_rf; ?>" data-target="#receive-feedback">
				<span><?php print t('Receive Feedback'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-convert-to-deals" class="cp-step row <?php print $class_convert_deals; ?>">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<?php if ($account_status != 'prospect' && $account_status != 'lead' && $account_status != 'opportunity') : ?>
				<a href="#" class="cp-link big-step">
					<span><?php print t('Converted to Deal in Progress!'); ?></span>
				</a>
				<a href="/company/<?php print arg(1); ?>?from=deal-in-progress" class="cp-link orange">
					<span><?php print t('Go to Deal in Progress Page'); ?></span>
				</a>
			<?php else: ?>
				<a href="#" class="cp-link big-step" data-toggle="<?php print $modal_access_cd; ?>" data-target="#convert-to-deals">
					<span><?php print t('Convert to Deal in Progress'); ?></span>
				</a>
			<?php endif; ?>
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
		      <?php if (isset($_GET['link_sent']) && $_GET['link_sent'] == 1) : ?>
		      	<div class="alert alert-success alert-dismissable" style="text-align: left;">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <?php print t('Email containing link sent to client.'); ?>
						</div>
		      <?php endif; ?>
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
		        	<button id="btn-send-link-plan-specs" type="button" data-toggle="modal" data-target="#send-link-email" class="orange-btn" data-dismiss="modal"><?php print t('Send Link'); ?></button>
		        	<button id="btn-receive-details" type="button" class="green-btn" data-toggle="modal" data-target="#receive-plan-details" data-dismiss="modal"><?php print t('Next: Receive Details'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="send-link-email" class="modal be-bs-modal" role="dialog">
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
		      		<div class="modal-body-inner be-forms send-link-email">
		      		<div class="form-title"><h2><?php print t('Send Link'); ?></h2></div>
	      				<div class="be-form-section">
				          <div class="row">
				            <div class="col-xs-6">
				              <?php print render($form['sl_date']); ?>
				            </div>
				            <div class="col-xs-6">
				              <?php print render($form['sl_sender']); ?>
				            </div>
				          </div>
				        </div>
				        <div class="be-form-single">
				          <?php print render($form['sl_subject']); ?>
				        </div>
				        <div class="be-form-single">
				          <?php print render($form['sl_recipient']); ?>
				        </div>
				        <div class="be-form-single">
				          <?php print render($form['sl_content']); ?>
				        </div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#request-specification" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<?php print render($form['send_link_email']); ?>
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
		      		<div class="modal-body-inner be-forms plan-specs">
		      			<div class="form-title"><h2><?php print t('Plan Specifications'); ?></h2></div>
	      				<div class="be-form-section">
				          <div class="row">
				            <div class="col-xs-6">
				              <?php print render($form['fringe_rates']); ?>
				            </div>
				            <div class="col-xs-6">
				              <?php print render($form['proposed_effective_date']); ?>
				            </div>
				          </div>
				        </div>
				        <div class="be-form-single">
				          <?php print render($form['other_work_locations']); ?>
				        </div>
				        <div class="be-form-section">
				          <div class="row">
				            <div class="col-xs-6">
				              <?php print render($form['number_of_employees']); ?>
				            </div>
				            <div class="col-xs-6">
				              <?php print render($form['number_of_dependents']); ?>
				            </div>
				          </div>
				        </div>
				        <div class="be-form-section">
				          <div class="row">
				            <div class="col-xs-6">
				              <?php print render($form['nature_of_business']); ?>
				            </div>
				            <div class="col-xs-6">
				              <?php print render($form['years_in_business']); ?>
				            </div>
				          </div>
				        </div>
				        <div class="be-form-section">
				          <div class="row">
				            <div class="col-xs-6">
				              <?php print render($form['tax_id']); ?>
				            </div>
				            <div class="col-xs-6">
				              <?php print render($form['renewal_date']); ?>
				            </div>
				          </div>
				        </div>
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
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#request-specification" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-receive-details" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-next-generate-rfp" type="button" data-toggle="modal" data-target="#generate-rfp" class="green-btn" data-dismiss="modal"><?php print t('Next: Generate RFP'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="generate-rfp" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Generate RFP'); ?></h3>
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
		      		<div class="modal-body-inner be-forms create-rfp">
		      			<div class="form-title"><h2><?php print t('Create New RFP'); ?></h2></div>
		      			<div class="be-form-single">
		      				<label><?php print t('Select Account'); ?></label>
				          <input type="text" value="<?php print $account_name; ?>" class="form-control form-text accnt-name-placeholder" readonly>
				        </div>
				        <div class="be-form-section select-benefits-container">
									<label class="select-benefit-label"><?php print t('Select Benefits'); ?></label>
									<div class="row">
									  <?php foreach ($form['bc_second']['benefits'] as $key => $value) : ?>
									    <?php if ($key[0] != '#') : ?>
									      <div class="col-xs-6">
									        <?php print render($form['bc_second']['benefits'][$key]); ?>
									        <?php if ($key == 'special_benefits_1') : ?>
									        	<?php print render($form['special_benefits_text_1']); ?>
									        <?php endif; ?>
									      </div>
									    <?php endif; ?>
									  <?php endforeach; ?>
									</div>
								</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#receive-plan-details" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-create-rfp" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<?php print render($form['next_to_rfp']); ?>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="receive-quote" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Receive Quote'); ?></h3>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <?php if (isset($_GET['from_rfp']) && $_GET['from_rfp'] == 1) : ?>
		      	<div class="alert alert-success alert-dismissable" style="text-align: left;">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <?php print t('RFP successfully added.'); ?>
						</div>
		      <?php endif; ?>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			
		      			<h3><?php print t('Quotation received from carrier?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#generate-rfp" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-recieve-quote" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-send-plan-proposal" type="button" class="green-btn" data-toggle="modal" data-target="#send-plan-proposal" data-dismiss="modal"><?php print t('Next: Send Plan Proposal'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="send-plan-proposal" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Send Plan Proposal'); ?></h3>
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
		      		<div class="modal-body-inner be-forms send-proposal">
		      			<div class="form-title"><h2><?php print t('Send New Proposal'); ?></h2></div>
		      			<div class="be-form-single">
		      				<label><?php print t('Select Account'); ?></label>
				          <input type="text" value="<?php print $account_name; ?>" class="form-control form-text accnt-name-placeholder" readonly>
		      			</div>

								<div class="be-form-section">
									<div class="row">
										<div class="col-xs-6"><?php print render($form['due_date']); ?></div>
										<div class="col-xs-6"><?php print render($form['priority']); ?></div>
									</div>
								</div>

								<div class="be-form-section select-benefits-container">
									<label class="select-benefit-label"><?php print t('Select Benefits'); ?></label>
									<div class="row">
									  <?php foreach ($form['bc_third']['benefits'] as $key => $value) : ?>
									    <?php if ($key[0] != '#') : ?>
									      <div class="col-xs-6">
									        <?php print render($form['bc_third']['benefits'][$key]); ?>
									        <?php if ($key == 'special_benefits_2') : ?>
									        	<?php print render($form['special_benefits_text_2']); ?>
									        <?php endif; ?>
									      </div>
									    <?php endif; ?>
									  <?php endforeach; ?>
									</div>
								</div>

								<div class="be-form-single"><?php print render($form['attach_proposal']); ?></div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#receive-quote" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-send-proposal" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-send-proposal-email" type="button" data-toggle="modal" data-target="#send-proposal-email" class="green-btn" data-dismiss="modal"><?php print t('Send Proposal'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="send-proposal-email" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Send Plan Proposal'); ?></h3>
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
		      		<div class="modal-body-inner be-forms send-proposal">
		      			<div class="form-title"><h2><?php print t('Send New Proposal'); ?></h2></div>
		      			<?php print render($form['subject']); ?>
		      			<?php print render($form['to']); ?>
		      			<?php print render($form['show_attachment']); ?>
		      			<?php print render($form['message']); ?>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#send-plan-proposal" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<?php print render($form['send_proposal_email']); ?>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="receive-feedback" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Receive feedback'); ?></h3>
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
		      			<h3><?php print t('Did client accept proposal?'); ?></h3>
		      			<div class="account-estimate">
		      				<label><?php print t('Account Estimate Value'); ?></label>
		      				<input type="text" name="account-estimate">
		      			</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#send-plan-proposal" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-receive-feedback" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-accept-proposal-yes" type="button" class="green-btn" data-toggle="modal" data-target="#convert-to-deals" data-dismiss="modal"><?php print t('Yes'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="convert-to-deals" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Convert to deal in progress'); ?></h3>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Convert to deal in progress?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-dismiss="modal"><?php print t('Not Now'); ?></button>
		        	<?php print render($form['convert_to_deal']); ?>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

</div>

<?php print drupal_render_children($form); ?>