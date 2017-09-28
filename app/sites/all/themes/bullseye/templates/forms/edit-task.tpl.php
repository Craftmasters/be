<?php print render($form['form_title']); ?>

<div class="be-form-single"><?php print render($form['task_name']); ?></div>

<div class="be-form-section">
	<div class="row">
	  <div class="col-xs-4"><?php print render($form['task_type']); ?></div>
	  <div class="col-xs-4"><?php print render($form['priority']); ?></div>
	  <div class="col-xs-4"><?php print render($form['contact']); ?></div>
	</div>
</div>

<div class="be-form-single"><?php print render($form['due_date']); ?></div>

<div class="be-form-section">
	<div class="row">
	  <div class="col-xs-4"><?php print render($form['status']); ?></div>
	</div>
</div>

<?php print render($form['submit_container']); ?>

<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>