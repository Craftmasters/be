<div class="be-regular-block">
  <h2 class="be-regular-h2"><?php print t('Activities'); ?></h2>
  <select class="select-link" id="activity-select-filter">
    <option value="all"><?php print t('All Tasks'); ?></option>
    <option value="phone_call"><?php print t('Phone Calls'); ?></option>
    <option value="meeting"><?php print t('Meetings'); ?></option>
    <option value="email"><?php print t('Emails'); ?></option>
    <option value="others"><?php print t('Others'); ?></option>
  </select>
  <div class="be-block-main" id="calendar-tab-activities">

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

  </div>
  <div class="be-block-pagination">
    <input type="hidden" id="activity-data-offset" value="0">
    <button type="button" id="activity-prev" title="previous">
      <i class="fa fa-caret-left" aria-hidden="true"></i>prev
    </button>
    <button type="button" id="activity-next" title="next">
      next<i class="fa fa-caret-right" aria-hidden="true"></i>
    </button>
  </div>
</div>