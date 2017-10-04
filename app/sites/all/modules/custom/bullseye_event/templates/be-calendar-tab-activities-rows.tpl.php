<?php if (!empty($activities)) : ?>
  <?php foreach($activities as $key => $value) : ?>
    <div class="be-calendar-act-row row">
      <div class="col-xs-1 center"><div class="circle"></div></div>
      <div class="col-xs-5">
        <span class="orange-font"><?php print $value->title; ?></span>
      </div>
      <div class="col-xs-4">
        <span class="gray-font">by <?php print $value->contact_name; ?></span>
      </div>
      <div class="col-xs-2 act-date">
        <span class="blue-gray-font"><?php print $value->formatted_date; ?></span>
      </div>
    </div>
  <?php endforeach; ?>
<?php else : ?>
  <div class="be-block-no-content">
    <span class="no-content"><?php print t('No content available at this moment.'); ?></span>
  </div>
<?php endif; ?>