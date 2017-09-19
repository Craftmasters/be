<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Open Proposals (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/proposals/add" rel="lightframe"><?php print t('Send New Proposal'); ?></a>
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
        <?php foreach ($proposals as $proposal): ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td>
              <span class="orange-font">
                <?php print $proposal->nid; ?>
              </span>
            </td>
            <td>
              <span class="gray-font">
                <a href="/company/allen-markarian?from=lead" class="gray-font">
                  <?php print Bullseye::getCompanyNameByNid($proposal->nid); ?>
                </a>
              </span>
            </td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td>
              <span class="light-gray-font">
                <?php print $proposal->field_due_date_value; ?>
              </span>
            </td>
            <td class="be-dot-td"><span class="dot-priority blue"></span></td>
            <td>
              <span class="light-gray-font">
                <?php Bullseye::getAuthor($proposal->uid); ?>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
