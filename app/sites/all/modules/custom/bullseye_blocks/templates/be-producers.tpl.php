<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-8">
        <span class="account-count"><?php print t('All Producers (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/producer/add" rel="lightframe"><?php print t('Add New Producer'); ?></a>
        <a class="be-table-button" href="/producers/pending"><?php print t('View Pending Requests'); ?></a>
      </div>
      <div class="col-md-4">
        <div class="be-table-right-icons">
          <a href="#"><img src="<?php print $magnifying_glass; ?>"></a>
          <a href="#"><img src="<?php print $single_user_gray; ?>"></a>
          <a href="#"><img src="<?php print $gray_gear; ?>"></a>
          <a href="#"><img src="<?php print $three_bars; ?>"></a>
        </div>
      </div>
    </div>
  </div>
  <div class="be-table-content">
    <table class="be-tables">
      <thead>
        <tr>
          <th class="cell-check"><input type="checkbox"></th>
          <th><?php print t('Producer Name'); ?></th>
          <th><?php print t('Primary Contact'); ?></th>
          <th><?php print t('Email Address'); ?></th>
          <th><?php print t('Leads Assigned'); ?></th>
          <th><?php print t('Opportunities Covered'); ?></th>
          <th><?php print t('Deals Closed'); ?></th>
          <th><?php print t('Win Ratio'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($producers as $producer): ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="orange-font"><?php print $producer->field_producer_name_value; ?></span></td>
            <td><span class="light-gray-font"><?php print $producer->field_primary_contact_value; ?></span></td>
            <td><span class="light-gray-font"><?php print $producer->mail; ?></span></td>
            <td><span class="gray-font"><?php print $be->leadsAssigned($producer); ?></span></td>
            <td><span class="gray-font"><?php print $be->opportunitiesCovered($producer); ?></span></td>
            <td><span class="gray-font"><?php print $be->dealsClosed($producer); ?></span></td>
            <td><span class="gray-font"><?php print $be->winRatio($producer); ?>%</span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
