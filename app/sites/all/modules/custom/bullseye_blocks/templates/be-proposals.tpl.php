<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Open Proposals (' . $total . ')'); ?></span>

        <?php if ($add_proposal) : ?>
          <a class="be-table-button" href="/proposals/add" rel="lightframe"><?php print t('Send New Proposal'); ?></a>
        <?php endif; ?>
        
      </div>
      <div class="col-md-6">
        <div class="be-table-right-icons">
          <a href="#"><img src="<?php print $magnifying_glass; ?>"></a>
          <?php if ($delete_proposal) : ?>
            <a href="/proposals/delete?&ids=" rel="lightframe" id="delete-proposals-link">
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
          <th><?php print t('ID'); ?></th>
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
          <th><?php print t('Priority'); ?></th>
          <th><?php print t('Created By'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($proposals as $proposal): ?>
          <?php $data = node_load($proposal->nid); ?>
          <?php $has = Bullseye::isBenefitActive($data->field_benefits['und']); ?>
          <?php $val = $data->field_priority[LANGUAGE_NONE][0]['value']; ?>
          <tr>
            <td class="cell-check">
              <input class="be-table-checkbox" type="checkbox" value="<?php print $proposal->nid; ?>">
            </td>
            <td>
              <a href="/proposals/edit/<?php print $proposal->nid; ?>" rel="lightframe">
                <span class="orange-font">
                  <?php print $proposal->nid; ?>
                </span>
              </a>  
            </td>
            <td>
              <a href="/company/<?php print $aliases[$proposal->field_account_nid]['alias'];?>?from=<?php print $aliases[$proposal->field_account_nid]['status'];?>">
                <span class="gray-font"><?php print Bullseye::getCompanyNameByNid($proposal->field_account_nid); ?></span>
              </a>
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['mm']; ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['lm']; ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['td']; ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['mc']; ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['dt']; ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['vs']; ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['lf']; ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['sd']; ?>">
            </td>
            <td class="be-dot-td">
              <span class="<?php print $has['sb']; ?>">
            </td>
            <td>
              <span class="light-gray-font">
                <?php print date('Y-d-m', strtotime($data->field_due_date[LANGUAGE_NONE][0]['value'])); ?>
              </span>
            </td>
            <td class="be-dot-td"><span class="dot-priority <?php Bullseye::priorityClass($val); ?>"></span></td>
            <td>
              <span class="light-gray-font">
                <?php Bullseye::getAuthor($proposal->uid); ?>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
