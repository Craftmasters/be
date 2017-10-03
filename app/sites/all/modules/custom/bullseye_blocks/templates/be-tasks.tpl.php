<div class="be-regular-block">
  <h2 class="be-regular-h2"><?php print t('Tasks'); ?></h2>
  <select class="select-link" id="task-select-filter">
  	<option value="all"><?php print t('All Tasks'); ?></option>
  	<option value="phone_call"><?php print t('Phone Calls'); ?></option>
    <option value="meeting"><?php print t('Meetings'); ?></option>
    <option value="email"><?php print t('Emails'); ?></option>
    <option value="others"><?php print t('Others'); ?></option>
  </select>
  <div class="additional-icons">
  	<a href="/be-event/close-tasks" id="main-close-task" rel="lightframe" style="display: none;">
  		<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
  	</a>
  	<button type="button" id="dummy-close-task">
  		<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
  	</button>
  </div>
  <div class="be-block-main" id="calendar-tab-tasks">
  	<?php foreach($tasks as $key => $value) : ?>
  		<div class="be-task-row row <?php print $value->field_task_status_value; ?>-task">
				<div class="col-xs-1">
					<input type="checkbox" value="<?php print $value->nid; ?>" class="task-checkbox" <?php print $value->checkbox_disabled; ?>>
				</div>
				<div class="col-xs-5">
					<span class="green-font task-desc <?php print $value->dot; ?>"><?php print $value->description; ?></span>
				</div>
				<div class="col-xs-3">
					<span class="gray-font">by <?php print $value->contact_name; ?></span>
				</div>
				<div class="col-xs-3 task-date">
					<span class="blue-gray-font">Due <?php print $value->formatted_date; ?></span>
				</div>  	
		  </div>
  	<?php endforeach; ?>
  </div>
  <div class="be-block-pagination">
  	<input type="hidden" id="data-offset" value="0">
  	<button type="button" id="task-prev" title="previous">
  		<i class="fa fa-angle-double-left" aria-hidden="true"></i>prev
  	</button>
  	<button type="button" id="task-next" title="next">
  		next<i class="fa fa-angle-double-right" aria-hidden="true"></i>
  	</button>
  </div>
</div>