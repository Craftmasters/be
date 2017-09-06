<div class="current-progress-main" node-id="<?php print $nid; ?>">
	
	<div class="cp-step row <?php print $class_verification; ?>">
		<div class="col-xs-2">
			<span class="indicator initial"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link big-step"><span><?php print t('Verification'); ?></span></a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_verify_sca_dbra; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#verify-sca-dbra">
				<span><?php print t('Verify if SCA/DBRA'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_classify_to_group; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#classify-to-group">
				<span><?php print t('Classify to group'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_validate_point_of_contact; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link gray" data-toggle="modal" data-target="#validate-contacts">
				<span><?php print t('Validate point of contact'); ?></span>
			</a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_set_priority; ?>">
		<div class="col-xs-2">
			<span class="indicator"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#set-priority">
				<span><?php print t('Set Priority'); ?></span>	
			</a>
		</div>
	</div>

	<div class="cp-step row <?php print $class_convert_to_prospect; ?>">
		<div class="col-xs-2">
			<span class="indicator end"></span>
		</div>
		<div class="col-xs-10">
				
			<?php if ($account_status != 'lead') : ?>
				<a href="#" class="cp-link big-step">
					<span><?php print t('Converted to Prospect!'); ?></span>
				</a>
				<a href="/company/<?php print arg(1); ?>?from=prospect" class="cp-link orange">
					<span><?php print t('Go to Prospect Page'); ?></span>
				</a>
			<?php else: ?>
				<a href="#" class="cp-link big-step" data-toggle="modal" data-target="#convert-to-prospect">
					<span><?php print t('Convert to Prospect'); ?></span>
				</a>
			<?php endif; ?>
		</div>
	</div>


	<div id="verify-sca-dbra" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Verify SCA/DBRA'); ?></h3>
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
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Did this lead/company ever work under SCA and/or DBRA?'); ?></h3>
		      			<?php print render($form['work_sca_dbra']); ?>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button id="btn-verify-yes-sca" type="button" class="green-btn" data-toggle="modal" data-target="#classify-to-group" data-dismiss="modal"><?php print t('Yes, SCA'); ?></button>
		        	<button id="btn-verify-yes-dbra" type="button" class="green-btn" data-toggle="modal" data-target="#classify-to-group" data-dismiss="modal"><?php print t('Yes, DBRA'); ?></button>
		        	<button id="btn-verify-yes-both" type="button" class="green-btn" data-toggle="modal" data-target="#classify-to-group" data-dismiss="modal"><?php print t('Yes, Both'); ?></button>
		        	<button id="btn-verify-no" type="button" class="gray-btn" data-toggle="modal" data-target="#plan-sca-dbra" data-dismiss="modal"><?php print t('No'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="plan-sca-dbra" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Verify SCA/DBRA'); ?></h3>
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
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		      	<div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Does this lead/company have plans on working under SCA/DBRA in the future?'); ?></h3>
		      			<?php print render($form['plan_to_work_sca_dbra']); ?>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button id="btn-plan-sca-dbra-yes" type="button" class="green-btn" data-toggle="modal" data-target="#classify-to-group" data-dismiss="modal"><?php print t('Yes'); ?></button>
		        	<button id="btn-plan-sca-dbra-no" type="button" class="gray-btn" data-toggle="modal" data-target="#lead-unqualified" data-dismiss="modal"><?php print t('No'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="lead-unqualified" class="modal be-bs-modal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-inner">
		    	<div class="modal-header">
		        <a href="#" class="close" data-dismiss="modal">&times;</a>
		        <div class="be-bs-modal-progress">
		        	<div class="be-bs-modal-progress-items">
		        		<div class="modal-progress-item">
		        			<div class="pr-line"><span></span></div>
		        			<h3><?php print t('Verify SCA/DBRA'); ?></h3>
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
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-body">
		        <div class="modal-body-wrap">
		      		<div class="modal-body-inner">
		      			<h3><?php print t('Lead is unqualified!'); ?></h3>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#verify-sca-dbra" data-dismiss="modal"><?php print t('Back'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="classify-to-group" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Classify to group'); ?></h3>
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
		      			<?php print render($form['field_tags']); ?>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#verify-sca-dbra" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-ctg" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-validate-point-of-contact" type="button" class="green-btn"  data-toggle="modal" data-target="#validate-contacts" data-dismiss="modal"><?php print t('Next: Validate point of contact'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="validate-contacts" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Validate point of contact'); ?></h3>
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
		      			<div class="add-contact-container">
		      				<button type="button" id="add-contact">Add</button>
		      			</div>
		      			<table class="table-vc">
		      				<thead>
		      					<tr>
			      					<th><?php print t('Name'); ?></th>
			      					<th><?php print t('Position'); ?></th>
			      					<th><?php print t('Contact Number'); ?></th>
			      					<th><?php print t('Email Address'); ?></th>
			      					<th></th>
			      				</tr>
		      				</thead>
		      				<tbody>
			      				<?php if (!empty($contacts)) : ?>
			      					<?php foreach ($contacts as $key => $value) : ?>
			      						<tr contact-id="<?php print $value['item_id']; ?>" class="old-data">
			      							<td><input type="text" class="con-name" value="<?php print $value['name']; ?>"></td>
			      							<td><input type="text" class="con-position" value="<?php print $value['position']; ?>"></td>
			      							<td><input type="text" class="con-phone" value="<?php print $value['phone']; ?>"></td>
			      							<td><input type="text" class="con-email" value="<?php print $value['email']; ?>"></td>
			      							<td><button type="button" class="con-delete">Delete</button></td>
			      						</tr>
			      					<?php endforeach; ?>
			      				<?php else: ?>
			      					<tr class="new-data">
			      						<td><input type="text" class="con-name" value=""></td>
		      							<td><input type="text" class="con-position" value=""></td>
		      							<td><input type="text" class="con-phone" value=""></td>
		      							<td><input type="text" class="con-email" value=""></td>
		      							<td><button type="button" class="con-delete-new">Delete</button></td>
			      					</tr>
			      				<?php endif; ?>
		      				</tbody>
		      			</table>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#classify-to-group" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-vpc" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-set-priority" type="button" class="green-btn"  data-toggle="modal" data-target="#set-priority" data-dismiss="modal"><?php print t('Next: Set Priority'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="set-priority" class="modal be-bs-modal" role="dialog">
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
		        			<h3><?php print t('Set priority'); ?></h3>
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
		      			<h3><?php print t('Set Priority'); ?></h3>
		      			<?php print render($form['priority']); ?>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <div class="be-custom-actions">
		        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#validate-contacts" data-dismiss="modal"><?php print t('Back'); ?></button>
		        	<button id="btn-save-exit-sp" type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
		        	<button id="btn-convert-to-prospect" type="button" class="green-btn"  data-toggle="modal" data-target="#convert-to-prospect" data-dismiss="modal"><?php print t('Next: Convert to Prospect'); ?></button>
		        </div>
		      </div>
		    </div>
	    </div>
	  </div>
	</div>

	<div id="convert-to-prospect" class="modal be-bs-modal" role="dialog">
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
		      			<h3><?php print t('Convert to prospect?'); ?></h3>
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