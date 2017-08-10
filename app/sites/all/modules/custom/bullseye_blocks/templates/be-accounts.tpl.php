<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Accounts (150)'); ?></span>
        <a class="be-table-header-button" href="#"><?php print t('Add New'); ?></a>
        <a class="be-table-header-button" href="/admin/content/leads/import" rel="lightframe"><?php print t('Import'); ?></a>
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
          <th><?php print t('Name'); ?></th>
          <th><?php print t('Title'); ?></th>
          <th><?php print t('Company'); ?></th>
          <th><?php print t('Email'); ?></th>
          <th><?php print t('Source'); ?></th>
          <th><?php print t('Business Type'); ?></th>
          <th><?php print t('Contract'); ?></th>
          <th><?php print t('Priority'); ?></th>
        </tr> 
      </thead>
      <tbody>
        <?php for ($i = 0; $i < 5; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td>
              <img class="be-tables-user-pic" src="/sites/all/themes/bullseye/images/icons/default_user.svg">
              <span class="gray-font">Chris Devon</span>
            </td>
            <td><span class="light-gray-font">Chief Operations Officer</span></td>
            <td><span class="orange-font">ABC Company</span></td>
            <td><span class="orange-font">jackjames@abc.com</span></td>
            <td><span class="light-gray-font">Conference 2016</span></td>
            <td><span class="light-gray-font">Women Owned</span></td>
            <td><span class="light-gray-font">SCA</span></td>
            <td><span class="dot-priority red"></span></td>
          </tr>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 5; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td>
              <img class="be-tables-user-pic" src="/sites/all/themes/bullseye/images/icons/default_user.svg">
              <span class="gray-font">Greg Holloway</span>
            </td>
            <td><span class="light-gray-font">VP of Human Resources</span></td>
            <td><span class="orange-font">Sharklame Ent.</span></td>
            <td><span class="orange-font">jackjames@abc.com</span></td>
            <td><span class="light-gray-font">Conference 2016</span></td>
            <td><span class="light-gray-font">Women Owned</span></td>
            <td><span class="light-gray-font">SCA</span></td>
            <td><span class="dot-priority green"></span></td>
          </tr>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 5; $i++) : ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td>
              <img class="be-tables-user-pic" src="/sites/all/themes/bullseye/images/icons/default_user.svg">
              <span class="gray-font">Jake Leithold</span>
            </td>
            <td><span class="light-gray-font">Benefits Manager</span></td>
            <td><span class="orange-font">Pitbull Inc.</span></td>
            <td><span class="orange-font">jackjames@abc.com</span></td>
            <td><span class="light-gray-font">Conference 2016</span></td>
            <td><span class="light-gray-font">Women Owned</span></td>
            <td><span class="light-gray-font">SCA</span></td>
            <td><span class="dot-priority blue"></span></td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  </div>
</div>