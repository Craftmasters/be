<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-9">
        <span class="account-count"><?php print t('All Deals in Progress (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/node/add/accounts?account_status=deal_in_progress" rel="lightframe"><?php print t('Add New Deal in Progress'); ?></a>
        <!--<a class="be-table-button" href="#"><?php print t('Import Deals in Progress'); ?></a>-->
      </div>
      <div class="col-md-3">
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
          <th class="be-table-arrow-td"><?php print t('Generate Trust Agreement'); ?></th>
          <th class="be-table-arrow-td"><?php print t('Proof of Agreement'); ?></th>
          <th class="be-table-arrow-td"><?php print t('Convert to Closed Deals'); ?></th>
          <th><?php print t('Trust Docs'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($deals as $d): ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td><span class="dot-priority red"></span></td>
            <!-- link "/company/allen-markarian?from=deal-in-progress" where 'allen-markarian' is the alias and 'deal-in-progress' is the status of account -->
            <td>
              <span class="orange-font">
                <a href="/company/<?php print $aliases[$d->nid]['alias'];?>?from=<?php print $aliases[$d->nid]['status'];?>" class="orange-font">
                  <?php print $d->field_company_value; ?>
                </a>
              </span>
            </td>
            <td>
              <span class="gray-font">
                <?php $be->buildAccountName($d->field_firstname_value, $d->field_middle_name_value, $d->field_lastname_value); ?>
              </span>
            </td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_green; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_gray; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_orange; ?>"></td>
            <td><span class="light-gray-font"><a href="#" class="light-gray-font">Pitbull.pdf</a></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
