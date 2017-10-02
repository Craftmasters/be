<?php foreach ($activities as $key => $value) : ?>
  <div class="be-activity-row row <?php print $value->field_event_type_value; ?>-event status-<?php print $value->field_task_status_value; ?>">
    <div class="col-xs-2 be-activity-icon">
      <div class="img-wrap"><img src="<?php print $value->icon_img; ?>"></div>
    </div>
    <div class="col-xs-8 be-activity-desc">
      <div class="event-desc-wrapper">
        <div class="event-desc-inner">
          <?php if ($value->field_event_type_value == 'task') : ?>
            <?php if ($value->field_task_status_value == 'open') : ?>
              <a class="new-loaded-event" href="/be-event/edit-task?nid=<?php print $value->nid; ?>&company=<?php print $nid; ?>" rel="lightframe">
                <span class="dot-status"></span>
                <span class="desc"><?php print $value->description; ?></span> <span class="target <?php print $value->usercolor; ?>"><?php print $value->contact_name; ?></span>
              </a>
            <?php else : ?>
              <span class="desc"><?php print $value->description; ?></span> <span class="target <?php print $value->usercolor; ?>"><?php print $value->contact_name; ?></span>
            <?php endif; ?>
          <?php else : ?>
            <span class="desc"><?php print $value->description; ?></span> <span class="target <?php print $value->usercolor; ?>"><?php print $value->contact_name; ?></span>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-xs-2 be-activity-date"><?php print $value->formatted_date; ?></div>
  </div>
<?php endforeach; ?>