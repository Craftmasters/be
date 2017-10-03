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