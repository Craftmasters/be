<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Campaigns (3)'); ?></span>
        <a class="be-table-button" href="/admin/config/services/mailchimp/campaigns/add" rel="lightframe"><?php print t('Create New Campaign'); ?></a>
      </div>
      <div class="col-md-6">
        <div class="be-table-right-icons">
          <a href="#"><img src="<?php print $magnifying_glass; ?>"></a>
          <a href="#" id="delete-mailchimp-link">
            <i class="fa fa-trash" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="be-table-content">
    <table class="be-tables sortable">
      <thead>
        <tr>
          <th class="cell-check"><input type="checkbox"></th>
          <th><?php print t('Name'); ?></th>
          <th><?php print t('Title'); ?></th>
          <th><?php print t('Company'); ?></th>
          <th><?php print t('Email'); ?></th>
          <th><?php print t('Contact Type'); ?></th>
          <th><?php print t('Business Type'); ?></th>
          <th><?php print t('Contract'); ?></th>
          <th class="be-dot-td"><?php print t('Priority'); ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="cell-check">
            <input class="be-table-checkbox" type="checkbox" value="" data-contact-id="">
          </td>
          <td>
            <img class="be-tables-user-pic" src="/sites/all/themes/bullseye/images/default-user.png">
            <a href="#" rel="lightframe">
              <span class="gray-font">Chris Devon</span>
            </a>
          </td>
          <td>
            <span class="light-gray-font">Chief Operations Officer</span>
          </td>
          <td>
            <span class="orange-font">
              <a href="#" class="orange-font">ABC Company</a>
            </span>
          </td>
          <td>
            <span class="orange-font">jackjames@abc.com</span>
          </td>
          <td>
            <span class="light-gray-font">Qualified Lead</span>
          </td>
          <td>
            <span class="light-gray-font">SDVSOB</span>
          </td>
          <td>
            <span class="light-gray-font">SCA</span>
          </td>
          <td class="be-dot-td"><span class="dot-priority red"></span></td>
        </tr>
        <tr>
          <td class="cell-check">
            <input class="be-table-checkbox" type="checkbox" value="" data-contact-id="">
          </td>
          <td>
            <img class="be-tables-user-pic" src="/sites/all/themes/bullseye/images/default-user.png">
            <a href="#" rel="lightframe">
              <span class="gray-font">Greg Holloway</span>
            </a>
          </td>
          <td>
            <span class="light-gray-font">VP of Human Resources</span>
          </td>
          <td>
            <span class="orange-font">
              <a href="#" class="orange-font">Pitbull Inc.</a>
            </span>
          </td>
          <td>
            <span class="orange-font">gerald@pitbull.com</span>
          </td>
          <td>
            <span class="light-gray-font">Referral Partner</span>
          </td>
          <td>
            <span class="light-gray-font">Women Owned</span>
          </td>
          <td>
            <span class="light-gray-font">DBRA</span>
          </td>
          <td class="be-dot-td"><span class="dot-priority green"></span></td>
        </tr>
        <tr>
          <td class="cell-check">
            <input class="be-table-checkbox" type="checkbox" value="" data-contact-id="">
          </td>
          <td>
            <img class="be-tables-user-pic" src="/sites/all/themes/bullseye/images/default-user.png">
            <a href="#" rel="lightframe">
              <span class="gray-font">Jake Leithold</span>
            </a>
          </td>
          <td>
            <span class="light-gray-font">Benefits Manager</span>
          </td>
          <td>
            <span class="orange-font">
              <a href="#" class="orange-font">Sharklame Ent.</a>
            </span>
          </td>
          <td>
            <span class="orange-font">jjsam@lame.com</span>
          </td>
          <td>
            <span class="light-gray-font">Producer</span>
          </td>
          <td>
            <span class="light-gray-font">Minority Owned</span>
          </td>
          <td>
            <span class="light-gray-font">SCA & DBRA</span>
          </td>
          <td class="be-dot-td"><span class="dot-priority blue"></span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
