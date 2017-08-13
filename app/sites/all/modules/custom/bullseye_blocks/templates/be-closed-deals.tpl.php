<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Closed Deals (6)'); ?></span>
        <a class="be-table-button" href="#"><?php print t('Export Closed Deals'); ?></a>
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
          <th><?php print t('Account'); ?></th>
          <th><?php print t('Contact Person'); ?></th>
          <th><?php print t('Benefit Guides'); ?></th>
          <th class="be-dot-td"><?php print t('Major Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Limited Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Teledoc'); ?></th>
          <th class="be-dot-td"><?php print t('MEC'); ?></th>
          <th class="be-dot-td"><?php print t('Dental'); ?></th>
          <th class="be-dot-td"><?php print t('Vision'); ?></th>
          <th class="be-dot-td"><?php print t('Life & AD&D'); ?></th>
          <th class="be-dot-td"><?php print t('Short Term Dissability'); ?></th>
          <th></th>
        </tr> 
      </thead>
      <tbody>
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="orange-font"><a href="/company?from=closed-deals" class="orange-font">ABC Company</a></span></td>
            <td><span class="gray-font">Chris Devon</span></td>
            <td><span class="light-gray-font"><a href="#" class="light-gray-font">ABC Company.pdf</a></span></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td><a href="#" class="be-table-button"><?php print t('Migrate to Arrow Cloud'); ?></a></span></td>
          </tr>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="orange-font"><a href="/company?from=closed-deals" class="orange-font">ABC Company</a></span></td>
            <td><span class="gray-font">Chris Devon</span></td>
            <td><span class="light-gray-font"><a href="#" class="light-gray-font">ABC Company.pdf</a></span></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td><a href="#" class="be-table-button green"><?php print t('Visit Arrow Cloud Page'); ?></a></span></td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  </div>
</div>