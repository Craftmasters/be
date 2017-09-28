<?php foreach ($activities as $key => $value) : ?>
  <div class="be-activity-row row">
    <div class="col-xs-2 be-activity-icon">
      <div class="img-wrap"><img src="<?php print $value->icon_img; ?>"></div>
    </div>
    <div class="col-xs-7 be-activity-desc">
      <?php if ($value->field_event_type_value == 'task') : ?>
        <?php if ($value->field_task_status_value == 'open') : ?>
          <a href="/be-event/edit-task?nid=<?php print $value->nid; ?>&company=<?php print $nid; ?>" rel="lightframe">
            <span class="desc"><?php print $value->description; ?></span> <span class="target <?php print $value->usercolor; ?>"><?php print $value->contact_name; ?></span>
          </a>
        <?php else : ?>
          <span class="desc"><?php print $value->description; ?></span> <span class="target <?php print $value->usercolor; ?>"><?php print $value->contact_name; ?></span>
        <?php endif; ?>
      <?php else : ?>
        <span class="desc"><?php print $value->description; ?></span> <span class="target <?php print $value->usercolor; ?>"><?php print $value->contact_name; ?></span>
      <?php endif; ?>
    </div>
    <div class="col-xs-3 be-activity-date"><?php print $value->formatted_date; ?></div>
  </div>
<?php endforeach; ?>