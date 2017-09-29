<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Closed Deals (0)'); ?></span>
        <a class="be-table-button" href="#"><?php print t('Export Closed Deals'); ?></a>
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
            <a href="/accounts/delete?from=closed_deals&ids=" rel="lightframe" id="delete-accounts-link">
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
          <th><?php print t('Account'); ?></th>
          <th><?php print t('Contact Person'); ?></th>
          <th class="be-dot-td"><?php print t('Major Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Limited Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Teledoc'); ?></th>
          <th class="be-dot-td"><?php print t('MEC'); ?></th>
          <th class="be-dot-td"><?php print t('Dental'); ?></th>
          <th class="be-dot-td"><?php print t('Vision'); ?></th>
          <th class="be-dot-td"><?php print t('Life & AD&D'); ?></th>
          <th class="be-dot-td"><?php print t('Short Term Dissability'); ?></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($deals_closed as $dc): ?>
          <tr>
            <td class="cell-check"><input class="be-table-checkbox" type="checkbox" value="" data-contact-id=""></td>
            <td>
              <span class="orange-font">
                <a href="/company/<?php print $aliases[$dc->nid]['alias'];?>?from=<?php print $aliases[$dc->nid]['status'];?>" class="orange-font">
                  <?php print $dc->title; ?>
                </a>
              </span>
            </td>
            <td>
              <a href="<?php print $dc->edit_link; ?>" rel="lightframe">
                <span class="gray-font">
                  <?php Bullseye::buildAccountName($dc->field_firstname_value, $dc->field_middle_name_value, $dc->field_lastname_value); ?>
                </span>
              </a>
            </td>
            <td class="be-dot-td">
              <span class="dot-priority green">
            </td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td><a href="#" class="be-table-button"><?php print t('Migrate to Arrow Cloud'); ?></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
