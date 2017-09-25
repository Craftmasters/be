<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-8">
        <span class="account-count"><?php print t('All Opportunities (' . $total . ')'); ?></span>
        <a class="be-table-button" data-toggle="modal" data-target="#add-new-account"><?php print t('Add New Opportunity'); ?></a>

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
                      <h3><?php print t('Is the company of the opportunity you are trying to add already exists in the system?'); ?></h3>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="be-custom-actions">
                    <a href="/accounts/new/opportunity" rel="lightframe" data-dismiss="modal" class="blue-gray-btn" id="company-exists-no"><?php print t('No'); ?></a>
                    <a href="/accounts/select-existing-company?from=opportunity" rel="lightframe" data-dismiss="modal" class="orange-btn" id="company-exists-yes"><?php print t('Yes'); ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="be-table-right-icons">
          <a href="#"><img src="<?php print $magnifying_glass; ?>"></a>
          <?php if ($assign_producers) : ?>
            <a href="/producer/assign?ids=" rel="lightframe" id="producer-assign-link">
              <img src="<?php print $single_user_gray; ?>">
            </a>
          <?php endif; ?>
          <?php if ($delete_accounts) : ?>
            <a href="/accounts/delete?from=opportunities&ids=" rel="lightframe" id="delete-accounts-link">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="be-table-content">
    <table class="be-tables sortable">
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
            <td class="cell-check">
              <input class="be-table-checkbox" type="checkbox" value="<?php print $o->nid; ?>" data-contact-id="<?php print $o->field_contacts_value; ?>">
            </td>
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
              <a href="<?php print $o->edit_link; ?>" rel="lightframe">
                <span class="gray-font">
                  <?php
                    Bullseye::buildAccountName(
                      $o->field_firstname_value,
                      $o->field_middle_name_value,
                      $o->field_lastname_value
                    );
                  ?>
                </span>
              </a>
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
            <td>
              <span class="light-gray-font">
                <?php if (!is_null(Bullseye::getLatestRfp($o->nid))): ?>
                  <?php print Bullseye::getLatestRfp($o->nid); ?>
                <?php endif; ?>
              </span>
            </td>
            <td><span class="light-gray-font">389910</span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
