<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Open Proposals (6)'); ?></span>
        <a class="be-table-button" href="#"><?php print t('Create New Proposal'); ?></a>
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
          <th><?php print t('ID'); ?></th>
          <th><?php print t('Account'); ?></th>
          <th class="be-dot-td"><?php print t('Major Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Limited Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Teledoc'); ?></th>
          <th class="be-dot-td"><?php print t('MEC'); ?></th>
          <th class="be-dot-td"><?php print t('Dental'); ?></th>
          <th class="be-dot-td"><?php print t('Vision'); ?></th>
          <th class="be-dot-td"><?php print t('Life & AD&D'); ?></th>
          <th class="be-dot-td"><?php print t('Short Term Dissability'); ?></th>
          <th class="be-dot-td"><?php print t('Specialty Benefits'); ?></th>
          <th><?php print t('Due Date'); ?></th>
          <th><?php print t('Priority'); ?></th>
          <th><?php print t('Created By'); ?></th>
        </tr> 
      </thead>
      <tbody>
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="orange-font">365234</span></td>
            <td><span class="gray-font">ABC Company</span></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td><span class="light-gray-font">8/30/2017</span></td>
            <td class="be-dot-td"><span class="dot-priority blue"></span></td>
            <td><span class="light-gray-font">James J</span></td>
          </tr>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 2; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="orange-font">325434</span></td>
            <td><span class="gray-font">XYZ Inc.</span></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td><span class="light-gray-font">8/30/2017</span></td>
            <td class="be-dot-td"><span class="dot-priority red"></span></td>
            <td><span class="light-gray-font">Beata S.</span></td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  </div>
</div>