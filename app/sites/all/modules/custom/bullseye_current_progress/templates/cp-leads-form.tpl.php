<div class="current-progress-main">
	
	<div class="cp-step row ">
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

<div id="verify-sca-dbra" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Verify SCA/DBRA</h4>
      </div>
      <div class="modal-body">
        <?php print render($form['work_sca_dbra']); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="plan-sca-dbra" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Plans on working under SCA/DBRA</h4>
      </div>
      <div class="modal-body">
        <?php print render($form['plan_to_work_sca_dbra']); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="classify-to-group" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Classify to Group</h4>
      </div>
      <div class="modal-body">
        <?php print render($form['field_tags']); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="validate-contacts" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Validate point of contact</h4>
      </div>
      <div class="modal-body">
        <?php print render($form['field_contacts']); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="set-priority" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Set Priority</h4>
      </div>
      <div class="modal-body">
        <?php print render($form['priority']); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="convert-to-prospect" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Convert to Prospect</h4>
      </div>
      <div class="modal-body">
        <?php print render($form['convert_to_prospect']); ?>
        <?php print render($form['submit']); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php print drupal_render_children($form); ?>