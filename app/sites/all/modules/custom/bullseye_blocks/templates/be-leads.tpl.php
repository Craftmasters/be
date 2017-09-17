<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Leads (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/node/add/accounts?account_status=lead" rel="lightframe"><?php print t('Add New'); ?></a>
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
    <table class="be-tables sortable">
      <thead>
        <tr>
          <th class="cell-check"><input type="checkbox"></th>
          <th><?php print t('Name'); ?></th>
          <th><?php print t('Title'); ?></th>
          <th><?php print t('Company'); ?></th>
          <th><?php print t('Email'); ?></th>
          <th><?php print t('Source'); ?></th>
          <th><?php print t('Business Type'); ?></th>
          <!--<th><?php //print t('Contract'); ?></th>
          <th><?php //print t('Priority'); ?></th>-->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($leads as $key => $l): ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td>
              <img class="be-tables-user-pic" src="/sites/all/themes/bullseye/images/default-user.png">
              <a href="<?php print drupal_get_path_alias('/node/' . $l->nid . '/edit'); ?>">
                <span class="gray-font">
                  <?php
                    Bullseye::buildAccountName(
                      $l->field_firstname_value,
                      $l->field_middle_name_value,
                      $l->field_lastname_value
                    );
                  ?>
                </span>
              </a>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $l->field_position_value; ?>
              </span>
            </td>
            <td>
              <span class="orange-font">
                <a href="/company/<?php print $aliases[$l->nid]['alias'];?>?from=<?php print $aliases[$l->nid]['status'];?>" class="orange-font">
                  <?php print $l->title; ?>
                </a>
              </span>
            </td>
            <td>
              <span class="orange-font">
                <?php print $l->field_email_value; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $l->field_source_value; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $l->field_type_of_business_value; ?>
              </span>
            </td>
            <!--<td>
              <span class="light-gray-font">
                SCA
              </span>
            </td>
            <td><span class="dot-priority red"></span></td>-->
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
