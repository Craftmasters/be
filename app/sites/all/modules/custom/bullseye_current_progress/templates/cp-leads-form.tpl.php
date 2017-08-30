<div class="current-progress-main">
	
	<div class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator initial big gray-check"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link"><?php print t('Verification'); ?></a>
		</div>
	</div>

	<div class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator green"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#verify-sca-dbra"><?php print t('Verify if SCA/DBRA'); ?></a>
		</div>
	</div>

	<div class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator green"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#classify-to-group"><?php print t('Classify to group'); ?></a>
		</div>
	</div>

	<div class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator gray"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link gray" data-toggle="modal" data-target="#validate-contacts"><?php print t('Validate point of contact'); ?></a>
		</div>
	</div>

	<div class="cp-step row">
		<div class="col-xs-2">
			<span class="indicator gray"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#set-priority"><?php print t('Set Priority'); ?></a>
		</div>
	</div>

	<div class="cp-step row ">
		<div class="col-xs-2">
			<span class="indicator end big no-check"></span>
		</div>
		<div class="col-xs-10">
			<a href="#" class="cp-link" data-toggle="modal" data-target="#convert-to-prospect"><?php print t('Convert to Prospect'); ?></a>
		</div>
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
	        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
	        	<button type="button" class="green-btn"  data-toggle="modal" data-target="#validate-contacts" data-dismiss="modal"><?php print t('Next: Validate point of contact'); ?></button>
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
	      			<table class="table-header-vc">
	      				<tr>
	      					<th><?php print t('Name'); ?></th>
	      					<th><?php print t('Position'); ?></th>
	      					<th><?php print t('Contact Number'); ?></th>
	      					<th><?php print t('Email Address'); ?></th>
	      				</tr>
	      			</table>
	      			<?php print render($form['field_contacts']); ?>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <div class="be-custom-actions">
	        	<button type="button" class="gray-btn" data-toggle="modal" data-target="#classify-to-group" data-dismiss="modal"><?php print t('Back'); ?></button>
	        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
	        	<button type="button" class="green-btn"  data-toggle="modal" data-target="#set-priority" data-dismiss="modal"><?php print t('Next: Set Priority'); ?></button>
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
	        	<button type="button" class="orange-btn" data-dismiss="modal"><?php print t('Save and Exit'); ?></button>
	        	<button type="button" class="green-btn"  data-toggle="modal" data-target="#convert-to-prospect" data-dismiss="modal"><?php print t('Next: Convert to Prospect'); ?></button>
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
	      			<?php print render($form['convert_to_prospect']); ?>
        		<?php print render($form['submit']); ?>
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

<?php print drupal_render_children($form); ?>