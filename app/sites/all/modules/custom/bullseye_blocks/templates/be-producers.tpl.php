<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Producers (6)'); ?></span>
        <a class="be-table-button" href="/admin/people/create"><?php print t('Add New Producer'); ?></a>
      </div>
      <div class="col-md-6">
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
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="orange-font">Szerlip & Co.</span></td>
            <td><span class="light-gray-font">Chris Robichaud</span></td>
            <td><span class="light-gray-font">crobichaud@szerlip.com</span></td>
            <td><span class="gray-font">850</span></td>
            <td><span class="gray-font">300</span></td>
            <td><span class="gray-font">100</span></td>
            <td><span class="gray-font">30%</span></td>
          </tr>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="orange-font">Atlas Insurance & Brokers LLC</span></td>
            <td><span class="light-gray-font">Eric Ferrer</span></td>
            <td><span class="light-gray-font">eric@atlasllc.com</span></td>
            <td><span class="gray-font">1000</span></td>
            <td><span class="gray-font">500</span></td>
            <td><span class="gray-font">250</span></td>
            <td><span class="gray-font">50%</span></td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  </div>
</div>
