<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-9">
        <span class="account-count"><?php print t('All Deals in Progress (' . $total . ')'); ?></span>
        <a class="be-table-button" data-toggle="modal" data-target="#add-new-account"><?php print t('Add New Deal in Progress'); ?></a>

        <div id="add-new-account" class="modal be-bs-modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-inner">
                <div class="modal-header">
                  <a href="#" class="close" data-dismiss="modal">&times;</a>
                </div>
                <div class="modal-body">
                  <div class="modal-body-wrap">
                    <div class="modal-body-inner">
                      <h3><?php print t('Is the company of the deal in progress you are trying to add already exists in the system?'); ?></h3>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="be-custom-actions">
                    <a href="/accounts/new/deal-in-progress" rel="lightframe" data-dismiss="modal" class="blue-gray-btn" id="company-exists-no"><?php print t('No'); ?></a>
                    <a href="/accounts/select-existing-company?from=deal-in-progress" rel="lightframe" data-dismiss="modal" class="orange-btn" id="company-exists-yes"><?php print t('Yes'); ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
          <th class="be-dot-td"><?php print t('Priority'); ?></th>
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
            <td class="be-dot-td"><span class="dot-priority red"></span></td>
            <!-- link "/company/allen-markarian?from=deal-in-progress" where 'allen-markarian' is the alias and 'deal-in-progress' is the status of account -->
            <td>
              <span class="orange-font">
                <a href="/company/<?php print $aliases[$d->nid]['alias'];?>?from=<?php print $aliases[$d->nid]['status'];?>" class="orange-font">
                  <?php print $d->title; ?>
                </a>
              </span>
            </td>
            <td>
              <span class="gray-font">
                <?php $be->buildAccountName($d->field_firstname_value, $d->field_middle_name_value, $d->field_lastname_value); ?>
              </span>
            </td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_green; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_orange; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $arrow_gray; ?>"></td>
            <td><span class="light-gray-font"><a href="#" class="light-gray-font">Pitbull.pdf</a></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
