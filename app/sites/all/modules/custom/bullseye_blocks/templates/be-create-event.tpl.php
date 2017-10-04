<div class="be-regular-block be-create-event" node-id="<?php print $nid; ?>">
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

            <div class="event-error-container"> </div>

            <?php if (arg(0) == 'calendar') : ?>
              <?php $ct_activity = drupal_get_form('bullseye_event_calendar_tab_activity_form'); ?>
              <?php print drupal_render($ct_activity); ?>
              <input type="hidden" id="calendar-activity-company-nid" value="">
            <?php endif; ?>

          	<div class="be-event-label">
          		<?php print t('Activity Name'); ?>
          	</div>
          	<div class="be-event-input">
          		<input type="text" placeholder="Add Activity" id="activity-name">
          	</div>
          </div>
          <div class="be-event-field-row row">

          	<div class="col-xs-6">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Type'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select id="activity-type">
                    <option value="phone_call"><?php print t('Phone Call'); ?></option>
			          		<option value="email"><?php print t('Email'); ?></option>
			          		<option value="meeting"><?php print t('Meeting'); ?></option>
                    <option value="others"><?php print t('Others'); ?></option>
		          		</select>
		          	</div>
		          </div>
          	</div>

          	<div class="col-xs-6">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Contact'); ?>
		          	</div>
		          	<div class="be-event-input">
                  <?php if (arg(0) == 'company') : ?>
                    <select id="select-contact">
                      <?php foreach ($people as $key => $value) : ?>
                        <option value="<?php print $value->field_contacts_value;?>">
                          <?php print $value->field_firstname_value . ' ' . $value->field_lastname_value; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  <?php else: ?>
                    <select id="activity-select-contact"></select>
                  <?php endif; ?>
		          	</div>
		          </div>
          	</div>

            <div class="col-xs-12">
              <div class="be-event-field">
                <div class="-task-event-error-container"> </div>
                <div class="be-event-label">
                  <?php print t('Date'); ?>
                </div>
                <div class="form-group event-datetimepicker">
                  <div class="input-group date" id="create-event-date-activity">
                      <input id="activity-date" type='text' class="form-control" placeholder="Click calendar to select date and time"/>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="be-custom-actions">
          	<a href="#" class="submit green-btn" id="btn-save-activity"><?php print t('Save'); ?></a>
          </div>
        </div>
        <div id="tab-1" class="tab-content">
          <div class="be-event-field">
            <div class="task-event-error-container"> </div>
          	<div class="be-event-label">
          		<?php print t('Task Name'); ?>
          	</div>
          	<div class="be-event-input">
          		<input type="text" placeholder="<?php print t('Add Task'); ?>" id="task-name">
          	</div>
          </div>
          <div class="be-event-field-row row">

          	<div class="col-xs-6">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Type'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select id="task-type">
                    <option value="phone_call"><?php print t('Phone Call'); ?></option>
                    <option value="email"><?php print t('Email'); ?></option>
                    <option value="meeting"><?php print t('Meeting'); ?></option>
                    <option value="others"><?php print t('Others'); ?></option>
                  </select>
		          	</div>
		          </div>
          	</div>

          	<div class="col-xs-6">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Priority'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select id="task-priority">
		          			<option value="low"><?php print t('Low'); ?></option>
                    <option value="normal"><?php print t('Normal'); ?></option>
                    <option value="high"><?php print t('High'); ?></option>
		          		</select>
		          	</div>
		          </div>
          	</div>

          	<div class="col-xs-12">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Assigned to'); ?>
		          	</div>
		          	<div class="be-event-input">
                  <select id="task-assigned-to">
                    <?php foreach ($users as $key => $value) : ?>
                      <option value="<?php print $key;?>">
                        <?php print $value; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
		          </div>
          	</div>

          	<div class="col-xs-12">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Due Date'); ?>
		          	</div>
		          	<div class="form-group event-datetimepicker">
                  <div class="input-group date" id="create-event-date-task">
                      <input type="text" class="form-control" id="task-date" placeholder="Click calendar to select date and time" />
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
		          </div>
          	</div>
          </div>
          <div class="be-custom-actions">
          	<a href="#" class="submit green-btn" id="btn-save-task"><?php print t('Save'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>