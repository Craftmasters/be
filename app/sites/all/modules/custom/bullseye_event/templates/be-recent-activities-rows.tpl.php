<?php foreach ($activities as $key => $value) : ?>
  <div class="be-activity-row row">
    <div class="col-xs-2 be-activity-icon">
      <div class="img-wrap"><img src="<?php print $value->icon_img; ?>"></div>
    </div>
    <div class="col-xs-7 be-activity-desc">
      <span class="desc"><?php print $value->description; ?></span> <span class="target orange-font"><?php print $value->contact_name; ?></span>
    </div>
    <div class="col-xs-3 be-activity-date"><?php print $value->formatted_date; ?></div>
  </div>
<?php endforeach; ?>