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

          	<div class="col-xs-6">
          		<div class="be-event-field">
		          	<div class="be-event-label">
		          		<?php print t('Type'); ?>
		          	</div>
		          	<div class="be-event-input">
		          		<select>
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
                    <select>
                      <?php foreach ($people as $key => $value) : ?>
                        <option value="<?php print $value->field_contacts_value;?>">
                          <?php print $value->field_firstname_value . ' ' . $value->field_lastname_value; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  <?php else: ?>
                    <select>
                      <option value="1">James J.</option>
                    </select>
                  <?php endif; ?>
		          	</div>
		          </div>
          	</div>

            <div class="col-xs-12">
              <div class="be-event-field">
                <div class="be-event-label">
                  <?php print t('Date'); ?>
                </div>
                <div class="form-group event-datetimepicker">
                  <div class="input-group date" id="create-event-date-activity">
                      <input type='text' class="form-control" placeholder="Click calendar to select date and time"/>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="be-custom-actions">
          	<a href="#" class="submit green-btn"><?php print t('Save'); ?></a>
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
                    <option value="phone_call"><?php print t('Phone Call'); ?></option>
                    <option value="email"><?php print t('Email'); ?></option>
                    <option value="meeting"><?php print t('Meeting'); ?></option>
                    <option value="others"><?php print t('Others'); ?></option>
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
		          		<?php print t('Contact'); ?>
		          	</div>
		          	<div class="be-event-input">
                  <?php if (arg(0) == 'company') : ?>
                    <select>
                      <?php foreach ($people as $key => $value) : ?>
                        <option value="<?php print $value->field_contacts_value;?>">
                          <?php print $value->field_firstname_value . ' ' . $value->field_lastname_value; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  <?php else: ?>
                    <select>
                      <option value="1">James J.</option>
                    </select>
                  <?php endif; ?>
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
                      <input type="text" class="form-control" placeholder="Click calendar to select date and time" />
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
		          </div>
          	</div>
          </div>
          <div class="be-custom-actions">
          	<a href="#" class="submit green-btn"><?php print t('Save'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>