<div class="be-regular-block">
  <h2 class="be-regular-h2"><?php print t('Tasks'); ?></h2>
  <select class="select-link">
  	<option><?php print t('All Tasks'); ?></option>
  </select>
  <div class="be-block-main">

  	<?php for ($i = 0; $i < 3; $i++) : ?>
  		<div class="be-task-row row">
				<div class="col-xs-1">
					<input type="checkbox">
				</div>
				<div class="col-xs-5">
					<span class="green-font task-desc red-dot">Meeting with Sarah Jones</span>
				</div>
				<div class="col-xs-3">
					<span class="gray-font">by James Jordan</span>
				</div>
				<div class="col-xs-3 task-date">
					<span class="blue-gray-font">Due July 18</span>
				</div>  	
		  </div>
  	<?php endfor; ?>

  	<?php for ($i = 0; $i < 2; $i++) : ?>
  		<div class="be-task-row row">
				<div class="col-xs-1">
					<input type="checkbox">
				</div>
				<div class="col-xs-5">
					<span class="green-font task-desc">Meeting with Albert Adams</span>
				</div>
				<div class="col-xs-3">
					<span class="gray-font">by James Jordan</span>
				</div>
				<div class="col-xs-3 task-date">
					<span class="blue-gray-font">Due July 18</span>
				</div>  	
		  </div>
  	<?php endfor; ?>

  	<?php for ($i = 0; $i < 4; $i++) : ?>
  		<div class="be-task-row row faded-row">
				<div class="col-xs-1">
					<input type="checkbox">
				</div>
				<div class="col-xs-5">
					<span class="green-font task-desc">Meeting with Albert Adams</span>
				</div>
				<div class="col-xs-3">
					<span class="gray-font">by James Jordan</span>
				</div>
				<div class="col-xs-3 task-date">
					<span class="blue-gray-font">Due July 18</span>
				</div>  	
		  </div>
  	<?php endfor; ?>

  </div>
</div>