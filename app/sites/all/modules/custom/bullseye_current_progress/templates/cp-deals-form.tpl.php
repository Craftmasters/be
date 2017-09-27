<div class="current-progress-main" node-id="<?php print $nid; ?>">
	
	<div id="div-gta" class="cp-step row <?php print $class_gta; ?>">
		<div class="col-xs-2">
			<span class="indicator initial"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Generate Trust Agreement'); ?></span></a>
		</div>
	</div>

	<div id="div-dd" class="cp-step row <?php print $class_dd; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_dd; ?>" data-target="#draw-documents">
				<span><?php print t('Draw documents'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-gsfi" class="cp-step row <?php print $class_gsfi; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_gsfi; ?>" data-target="#generate-invoice">
				<span><?php print t('Generate set-up fee invoice'); ?></span>
			</a>
		</div>
	</div>
	
	<div id="div-sd" class="cp-step row <?php print $class_sd; ?>">
		<div class="col-xs-2">
			<span class="indicator "></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_sd; ?>" data-target="#send-documents">
				<span><?php print t('Send documents'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-poa" class="cp-step row <?php print $class_poa; ?>">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Proof of Agreement'); ?></span></a>
		</div>
	</div>

	<div id="div-rsd" class="cp-step row <?php print $class_rsd; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_rsd; ?>" data-target="#receive-signed-documents">
				<span><?php print t('Receive signed documents'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-cp" class="cp-step row <?php print $class_cp; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="<?php print $modal_access_cp; ?>" data-target="#collect-premium">
				<span><?php print t('Collect Premium'); ?></span>
			</a>
		</div>
	</div>

	<div id="div-ctcd" class="cp-step row <?php print $class_ctcd; ?>">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
			<?php if ($account_status != 'lead' && $account_status != 'prospect' && $account_status != 'opportunity' && $account_status != 'deal_in_progress' && $account_status != '') : ?>
				<a href="#" class="cp-link big-step">
					<span><?php print t('Converted to Closed Deal!'); ?></span>
				</a>
				<a href="/company/<?php print arg(1); ?>?from=closed_deal" class="cp-link orange">
					<span><?php print t('Go to Closed Deal Page'); ?></span>
				</a>
			<?php else: ?>
				<a href="#" class="cp-link big-step" data-toggle="<?php print $modal_access_ctcd; ?>" data-target="#convert-to-closed-deal"><span><?php print t('Convert to Closed Deal'); ?></span></a>
			<?php endif; ?>
		</div>
	</div>

	<div id="draw-documents" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Draw documents'); ?></h3>
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
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Done preparing the contract?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-next-generate-invoice" type="button" class="green-btn" data-toggle="modal" data-target="#generate-invoice" data-dismiss="modal"><?php print t('Next: Generate Invoice'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="generate-invoice" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Generate invoice'); ?></h3>
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
		      		<div class="modal-body-inner be-forms setup-fee">
		      			<div class="form-title"><h2><?php print t('Setup Fee'); ?></h2></div>
		      			<table class="table-sfi">
		      				<thead>
		      					<tr>
			      					<th><?php print t('Item Description'); ?></th>
			      					<th><?php print t('Quantity'); ?></th>
			      					<th><?php print t('Amount'); ?></th>
			      					<th></th>
			      				</tr>
		      				</thead>
		      				<tbody>
			      				<?php if (!empty($setup_fee_items)) : ?>
			      					<?php foreach ($setup_fee_items as $key => $value) : ?>
			      						<tr sfi-id="<?php print $value['item_id']; ?>" class="old-data">
			      							<td><input type="text" class="sfi-description" value="<?php print $value['description']; ?>"></td>
			      							<td><input type="text" class="sfi-quantity" value="<?php print $value['quantity']; ?>"></td>
			      							<td><input type="text" class="sfi-amount" value="<?php print $value['amount']; ?>"></td>
			      							<td>
			      								<button type="button" class="sfi-delete">
			      									<i class="fa fa-times" aria-hidden="true"></i>
			      								</button>
			      							</td>
			      						</tr>
			      					<?php endforeach; ?>
			      				<?php else: ?>
			      					<tr class="new-data">
			      						<td><input type="text" class="sfi-description" value=""></td>
			      						<td><input type="text" class="sfi-quantity" value=""></td>
		      							<td><input type="text" class="sfi-amount" value=""></td>
		      							<td>
		      								<button type="button" class="sfi-delete-new">
		      									<i class="fa fa-times" aria-hidden="true"></i>
		      								</button>
		      							</td>
			      					</tr>
			      				<?php endif; ?>
		      				</tbody>
		      			</table>
		      			<div class="setup-fee-add-container">
		      				<a href="#">+ <?php print t('Add another item'); ?></a>
		      			</div>
		      			<div class="be-form-single">
				          <?php print render($form['invoice_due_date']); ?>
				        </div>
				        <div class="be-form-single">
				          <?php print render($form['invoice_notes']); ?>
				        </div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#draw-documents" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-sfi" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-next-send-documents"type="button" class="green-btn" data-toggle="modal" data-target="#send-documents" data-dismiss="modal"><?php print t('Next'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="send-documents" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner send-document-pdf">
								<div class="pdf-dummy-preview">
                  <div class="pdf-header">
                    <img src="<?php print $pdf_logo; ?>">
                  </div>
                  <div class="pdf-body">
                    <div class="pdf-body-content">
                    	<h1><?php print t('Invoice'); ?></h1>
                    	<div class="row company-info">
                    		<div class="col-md-6">
                    			<div class="person-name">Jeff Smith</div>
                    			<div class="title">CEO</div>
                    			<div class="company-name">ABC Company</div>
                    			<div class="company-street">680 My Drive</div>
                    			<div class="company-add">Garden City, NY, 11530</div>
                    		</div>
                    		<div class="col-md-6 other-info">
                    			<div class="invoice-no"><span>Invoice no</span><span>INV-20000044</span></div>
                    			<div class="invoice-due-date"><span>Due Date</span><span>12/01/2018</span></div>
                    			<div class="account-no"><span>Account no</span><span>20123334569</span></div>
                    		</div>
                    	</div>
                    	<table>
					      				<thead>
					      					<tr>
					      						<th><?php print t('Item Description'); ?></th>
					      						<th><?php print t('Quantity'); ?></th>
					      						<th><?php print t('Amount'); ?></th>
					      					</tr>
					      				</thead>
					      				<tbody>
					      					<tr><td></td><td></td><td></td></tr>
					      					<tr>
					      						<td>Item 1</td>
					      						<td>1</td>
					      						<td>$100.00</td>
					      					</tr>
					      					<tr>
					      						<td>Item 2</td>
					      						<td>10</td>
					      						<td>$200.00</td>
					      					</tr>
					      					<tr>
					      						<td class="invoice-notes">
					      							<h2>Notes</h2>
					      							<p>Thank you for your business.</p>
					      						</td>
					      						<td>Total</td>
					      						<td>$300.00</td>
					      					</tr>
					      				</tbody>
					      			</table>
                    </div>
                  </div>
                  <div class="pdf-footer">
                    <p>100 Commons Rd, Ste 7377, Dripping Springs, TX 78620</p>
                    <p>(888) 745-0754 | support@archerjordan.com</p>
                  </div>
                </div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#generate-invoice" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button type="button" class="orange-btn" data-toggle="modal" data-target="#send-documents-email" data-dismiss="modal"><?php print t('Send Invoice'); ?></button>
		        	<button type="button" class="green-btn" data-toggle="modal" data-target="#receive-signed-documents" data-dismiss="modal"><?php print t('Next: Receive Signed Documents'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="send-documents-email" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Send Documents'); ?></h3>
		        		</div>
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner be-forms send-documents-email">
		      			<div class="form-title"><h2><?php print t('Send Invoice'); ?></h2></div>
		      			<?php print render($form['subject']); ?>
		      			<?php print render($form['to']); ?>
		      			<?php print render($form['show_attachment']); ?>
		      			<?php print render($form['message']); ?>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#send-documents" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-send-documents" type="button" class="green-btn"><?php print t('Send'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="receive-signed-documents" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Receive signed documents'); ?></h3>
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
		      			<h3><?php print t('Signed contract received?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#send-documents" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button type="button" class="green-btn" data-toggle="modal" data-target="#collect-premium" data-dismiss="modal"><?php print t('Next: Collect Premium'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="collect-premium" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Collect premium'); ?></h3>
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
		      			<h3><?php print t('Premium collected?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#receive-signed-documents" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button type="button" class="green-btn" data-toggle="modal" data-target="#convert-to-closed-deal" data-dismiss="modal"><?php print t('Next: Convert to Closed Deal'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="convert-to-closed-deal" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Collect premium'); ?></h3>
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
		      			<h3><?php print t('Convert to closed deal?'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="green-btn" data-dismiss="modal"><?php print t('Yes'); ?></button>
		        	<button type="button" class="gray-btn" data-dismiss="modal"><?php print t('Not Now'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

</div>

<?php print drupal_render_children($form); ?>