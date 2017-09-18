<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-8">
        <span class="account-count"><?php print t('All Opportunities (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/node/add/accounts?account_status=opportunity" rel="lightframe"><?php print t('Add New Opportunity'); ?></a>
        <!--<a class="be-table-button" href="#"><?php print t('Import Opportunities'); ?></a>-->
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
          <th class="be-dot-td"><?php print t('Priority'); ?></th>
          <th><?php print t('Account'); ?></th>
          <th><?php print t('Contact Person'); ?></th>
          <th class="be-table-arrow-td"><?php print t('Plan Specification'); ?></th>
          <th class="be-table-arrow-td"><?php print t('RFP'); ?></th>
          <th class="be-table-arrow-td"><?php print t('Plan Presentation'); ?></th>
          <th class="be-table-arrow-td"><?php print t('Convert to Deals in Progress'); ?></th>
          <th><?php print t('RFP'); ?></th>
          <th><?php print t('Proposal'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($opportunities as $o): ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td class="be-dot-td"><span class="dot-priority red"></span></td>
            <!-- link "/company/allen-markarian?from=opportunity" where 'allen-markarian' is the alias and 'opportunity' is the status of account -->
            <td>
              <span class="orange-font">
                <a href="/company/<?php print $aliases[$o->nid]['alias'];?>?from=<?php print $aliases[$o->nid]['status'];?>" class="orange-font">
                  <?php print $o->title; ?>
                </a>
              </span>
            </td>
            <td>
              <span class="gray-font">
                <?php
                  Bullseye::buildAccountName(
                    $o->field_firstname_value,
                    $o->field_middle_name_value,
                    $o->field_lastname_value
                  );
                ?>
              </span>
            </td>
            <td class="be-table-arrow-td">
              <img src="<?php print $o->plan_specs_td; ?>">
            </td>
            <td class="be-table-arrow-td">
              <img src="<?php print $o->rfp_td; ?>">
            </td>
            <td class="be-table-arrow-td">
              <img src="<?php print $o->plan_pres_td; ?>">
            </td>
            <td class="be-table-arrow-td">
              <img src="<?php print $o->convert_td; ?>">
            </td>
            <td><span class="light-gray-font">RFP389910</span></td>
            <td><span class="light-gray-font">389910</span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
