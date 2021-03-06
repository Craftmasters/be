<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-8">
        <span class="account-count"><?php print t('All Deals in Progress (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/accounts/select-existing-company?from=deal-in-progress" rel="lightframe"><?php print t('Add New Deal in Progress'); ?></a>
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
            <a href="/accounts/delete?from=deals_in_progress&ids=" rel="lightframe" id="delete-accounts-link">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          <?php endif; ?>
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
            <td class="cell-check">
              <input class="be-table-checkbox" type="checkbox" value="<?php print $d->nid; ?>" data-contact-id="<?php print $d->field_contacts_value; ?>">
            </td>
            <td class="be-dot-td"><span class="dot-priority red"></span></td>
            <td>
              <span class="orange-font">
                <a href="/company/<?php print $aliases[$d->nid]['alias'];?>?from=<?php print $aliases[$d->nid]['status'];?>" class="orange-font">
                  <?php print $d->title; ?>
                </a>
              </span>
            </td>
            <td>
              <a href="<?php print $d->edit_link; ?>" rel="lightframe">
                <span class="gray-font">
                  <?php $be->buildAccountName($d->field_firstname_value, $d->field_middle_name_value, $d->field_lastname_value); ?>
                </span>
              </a>
            </td>
            <td class="be-table-arrow-td"><img src="<?php print $d->gta_td; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $d->pa_td; ?>"></td>
            <td class="be-table-arrow-td"><img src="<?php print $d->ccd_td; ?>"></td>
            <td><span class="light-gray-font"><a href="#" class="light-gray-font">Pitbull.pdf</a></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
