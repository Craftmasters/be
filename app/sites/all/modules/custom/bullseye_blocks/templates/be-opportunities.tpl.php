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
          <th><?php print t('Priority'); ?></th>
          <th><?php print t('Account'); ?></th>
          <th><?php print t('Contact Person'); ?></th>
          <th class="be-table-arrow-td"><?php print t('Build Rapport'); ?></th>
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
            <td><span class="dot-priority red"></span></td>
            <!-- link "/company/allen-markarian?from=opportunity" where 'allen-markarian' is the alias and 'opportunity' is the status of account -->
            <td>
              <span class="orange-font">
                <a href="/company/allen-markarian?from=opportunity" class="orange-font">
                  <?php print $o->field_company_value; ?>
                </a>
              </span>
            </td>
            <td><span class="gray-font">Chris Devon</span></td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_green; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_green; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_orange; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_gray; ?>"></td>
            <td><span class="light-gray-font">RFP389910</span></td>
            <td><span class="light-gray-font">389910</span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
