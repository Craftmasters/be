<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Deals in Progress (6)'); ?></span>
        <a class="be-table-header-button" href="#"><?php print t('Add New Deal in Progress'); ?></a>
        <a class="be-table-header-button" href="#"><?php print t('Import Deals in Progress'); ?></a>
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
          <th><?php print t('Priority'); ?></th>
          <th><?php print t('Account'); ?></th>
          <th><?php print t('Contact Person'); ?></th>
          <th><?php print t('Generate Trust Agreement'); ?></th>
          <th><?php print t('Proof of Agreement'); ?></th>
          <th><?php print t('Convert to Closed Deals'); ?></th>
          <th><?php print t('Trust Docs'); ?></th>
        </tr> 
      </thead>
      <tbody>
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="dot-priority red"></span></td>
            <td><span class="orange-font">ABC Company</span></td>
            <td><span class="gray-font">Chris Devon</span></td>
            <td></td>
            <td></td>
            <td></td>
            <td><span class="light-gray-font"><a href="#" class="light-gray-font">Pitbull.pdf</a></span></td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  </div>
</div>