<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Open RFP\'s (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/rfps/initial-add" rel="lightframe"><?php print t('Create New RFP'); ?></a>
      </div>
      <div class="col-md-6">
        <div class="be-table-right-icons">
          <a href="#"><img src="<?php print $magnifying_glass; ?>"></a>
          <?php if ($delete_rfps) : ?>
            <a href="/rfps/delete?ids=" rel="lightframe" id="delete-rfps-link">
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
          <th><?php print t('RFP ID'); ?></th>
          <th><?php print t('Account'); ?></th>
          <th class="be-dot-td"><?php print t('Major Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Limited Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Teledoc'); ?></th>
          <th class="be-dot-td"><?php print t('MEC'); ?></th>
          <th class="be-dot-td"><?php print t('Dental'); ?></th>
          <th class="be-dot-td"><?php print t('Vision'); ?></th>
          <th class="be-dot-td"><?php print t('Life & AD&D'); ?></th>
          <th class="be-dot-td"><?php print t('Short Term Dissability'); ?></th>
          <th class="be-dot-td"><?php print t('Specialty Benefits'); ?></th>
          <th><?php print t('Due Date'); ?></th>
          <th class="be-dot-td"><?php print t('Priority'); ?></th>
          <th><?php print t('Created By'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rfps as $rfp): ?>
          <?php $data = node_load($rfp->nid); ?>
          <tr>
            <td class="cell-check">
              <input class="be-table-checkbox" type="checkbox" value="<?php print $rfp->nid; ?>">
            </td>
            <td>
              <a href="/content/<?php print $rfp->title; ?>">
                <span class="orange-font">
                  <?php print $rfp->title; ?>
                </span>
              </a>
            </td>
            <td>
              <a href="/company/<?php print $rfp->alias_details['alias'];?>?from=<?php print $rfp->alias_details['status'];?>">
                <span class="gray-font">
                  <?php print $rfp->field_company_value; ?>
                </span>
              </a>
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_mm_current_carrier_value); ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_lm_current_carrier_value); ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_tl_current_carrier_value); ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_mec_current_carrier_value); ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_den_current_carrier_value); ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_vs_current_carrier_value); ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_lf_current_carrier_value); ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_std_current_carrier_value); ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($rfp->field_sb_current_carrier_value); ?>">
            </td>
            <td>
              <span class="light-gray-font">
                <?php if (isset($data->field_due_date[LANGUAGE_NONE])): ?>
                  <?php print date('Y-d-m', strtotime($data->field_due_date[LANGUAGE_NONE][0]['value'])); ?>
                <?php endif; ?>
              </span>
            </td>
            <td class="be-dot-td">
              <span class="dot-priority <?php Bullseye::priorityClass(); ?>"></span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php Bullseye::getAuthor($rfp->uid); ?>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
