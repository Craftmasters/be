<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t("All Carriers ($total_carriers->total)"); ?></span>
        <a class="be-table-button" href="/carriers/add"><?php print t('Add New Carrier'); ?></a>
        <!--<a class="be-table-button" href="#"><?php print t('Import Carriers'); ?></a>-->
      </div>
      <div class="col-md-6">
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
          <th><?php print t('ID'); ?></th>
          <th><?php print t('Carier Name'); ?></th>
          <th><?php print t('Primary Contact'); ?></th>
          <th><?php print t('Email Address'); ?></th>
          <th class="be-dot-td"><?php print t('Major Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Limited Medical'); ?></th>
          <th class="be-dot-td"><?php print t('Teledoc'); ?></th>
          <th class="be-dot-td"><?php print t('MEC'); ?></th>
          <th class="be-dot-td"><?php print t('Dental'); ?></th>
          <th class="be-dot-td"><?php print t('Vision'); ?></th>
          <th class="be-dot-td"><?php print t('Life & AD&D'); ?></th>
          <th class="be-dot-td"><?php print t('Short Term Dissability'); ?></th>
          <th class="be-dot-td"><?php print t('Specialty Benefits'); ?></th>
          <th class="be-dot-td"><?php print t('Retirement'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($carriers as $carrier): ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td>
              <span class="light-gray-font">
                <a href="<?php print drupal_get_path_alias('node/' . $carrier->nid); ?>">
                  <?php print $carrier->nid; ?>
                </a>
              </span>
            </td>
            <td>
              <span class="orange-font">
                <?php print $carrier->title; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $carrier->field_primary_contact_value; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $carrier->field_email_value; ?>
              </span>
            </td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority gray"></td>
            <td class="be-dot-td"><span class="dot-priority green"></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
