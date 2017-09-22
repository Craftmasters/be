<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Accounts (' . $total . ')'); ?></span>
        <a class="be-table-button" data-toggle="modal" data-target="#add-new-account"><?php print t('Add New'); ?></a>
        <a class="be-table-button" href="/admin/content/leads/import" rel="lightframe"><?php print t('Import'); ?></a>

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
                      <h3><?php print t('Is the company of the lead you are trying to add already exists in the system?'); ?></h3>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="be-custom-actions">
                    <a href="/accounts/new/lead" rel="lightframe" data-dismiss="modal" class="blue-gray-btn" id="company-exists-no"><?php print t('No'); ?></a>
                    <a href="/accounts/select-existing-company?from=lead" rel="lightframe" data-dismiss="modal" class="orange-btn" id="company-exists-yes"><?php print t('Yes'); ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="be-table-right-icons">
          <a href="#"><img src="<?php print $magnifying_glass; ?>"></a>
          <?php if ($assign_producers) : ?>
            <a href="/producer/assign?ids=" rel="lightframe" id="producer-assign-link">
              <img src="<?php print $single_user_gray; ?>">
            </a>
          <?php endif; ?>
          <?php if ($delete_accounts) : ?>
            <a href="/accounts/delete?ids=" rel="lightframe" id="delete-accounts-link">
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
        <?php foreach ($accounts as $key => $a): ?>
          <tr>
            <td class="cell-check"><input class="be-table-checkbox" type="checkbox" value="<?php print $a->nid; ?>"></td>
            <td>
              <img class="be-tables-user-pic" src="<?php print $profile_pictures[$key]; ?>">
              <a href="<?php print $a->edit_link; ?>" rel="lightframe">
                <span class="gray-font">
                  <?php
                    Bullseye::buildAccountName(
                      $a->field_firstname_value,
                      $a->field_middle_name_value,
                      $a->field_lastname_value
                    );
                  ?>
                </span>
              </a>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $a->field_position_value; ?>
              </span>
            </td>
            <td>
              <span class="orange-font">
                <a href="/company/<?php print $aliases[$a->nid]['alias'];?>?from=<?php print $aliases[$a->nid]['status'];?>" class="orange-font">
                  <?php print $a->title; ?>
                </a>
              </span>
            </td>
            <td>
              <span class="orange-font">
                <?php print $a->field_email_value; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $a->field_source_value; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $a->field_type_of_business_value; ?>
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
