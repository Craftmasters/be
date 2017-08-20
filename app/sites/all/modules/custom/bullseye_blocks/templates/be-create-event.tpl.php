<div class="be-regular-block be-create-event">
  <h2 class="be-regular-h2"><?php print t('Create Event'); ?></h2>
  <div class="be-block-main">
  	<div class="tabbed-block">
      <div class="tab-navigations">
        <ul class="tabs-menu">
          <li class="current"><a href="#tab-0"><?php print t('Log Activity'); ?></a></li>
          <li><a href="#tab-1"><?php print t('New Task'); ?></a></li>
        </ul>
      </div>
      <div class="body-tabs">
        <div id="tab-0" class="tab-content">
          <div class="be-event-field">
          	<div class="be-event-label">
          		<?php print t('Activity Name'); ?>
          	</div>
          	<div class="be-event-input">
          		<input type="text" placeholder="Add Activity">
          	</div>
          </div>
          <div class="be-event-field-row row">

          	<div class="col-xs-4">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Type'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select>
		          			<option value="1"><?php print t('Phone Call'); ?></option>
		          		</select>
		          	</div>
		          </div>
          	</div>

          	<div class="col-xs-4">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Date'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<!-- To be changed to datetimepicker -->
		          		<select>
		          			<option value="1">07/06/2017</option>
		          		</select>
		          	</div>
		          </div>
          	</div>

          	<div class="col-xs-4">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Assigned To'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select>
		          			<option value="1">James J.</option>
		          		</select>
		          	</div>
		          </div>
          	</div>
          </div>
        </div>
        <div id="tab-1" class="tab-content">
          <div class="be-event-field">
          	<div class="be-event-label">
          		<?php print t('Task Name'); ?>
          	</div>
          	<div class="be-event-input">
          		<input type="text" placeholder="<?php print t('Add Task'); ?>">
          	</div>
          </div>
          <div class="be-event-field-row row">

          	<div class="col-xs-4">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Type'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select>
		          			<option value="1"><?php print t('Phone Call'); ?></option>
		          		</select>
		          	</div>
		          </div>
          	</div>

          	<div class="col-xs-4">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Priority'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select>
		          			<option value="1">Normal</option>
		          		</select>
		          	</div>
		          </div>
          	</div>

          	<div class="col-xs-4">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Assigned To'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select>
		          			<option value="1">James Jordan</option>
		          		</select>
		          	</div>
		          </div>
          	</div>

          	<div class="col-xs-4">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Due Date'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<!-- To be changed to datetimepicker -->
		          		<select>
		          			<option value="1">07/06/2017</option>
		          		</select>
		          	</div>
		          </div>
          	</div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>