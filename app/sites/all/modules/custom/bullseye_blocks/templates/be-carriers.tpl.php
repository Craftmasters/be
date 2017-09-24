<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t("All Carriers ($total_carriers->total)"); ?></span>
        <a class="be-table-button" href="/carriers/add" rel="lightframe"><?php print t('Add New Carrier'); ?></a>
        <!--<a class="be-table-button" href="#"><?php //print t('Import Carriers'); ?></a>-->
      </div>
      <div class="col-md-6">
        <div class="be-table-right-icons">
          <a href="#"><img src="<?php print $magnifying_glass; ?>"></a>
          <?php if ($delete_carrier) : ?>
            <a href="/carriers/delete?&ids=" rel="lightframe" id="delete-carriers-link">
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
          <th class="be-dot-td"><?php print t('ID'); ?></th>
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
            <td class="cell-check">
              <input class="be-table-checkbox" type="checkbox" value="<?php print $carrier->nid; ?>">
            </td>
            <td class="be-dot-td">
              <a href="/carriers/edit/<?php print $carrier->nid; ?>" rel="lightframe">
                <span class="light-gray-font"><?php print $carrier->nid; ?></span>
              </a>
            </td>
            <td>
              <a href="/carriers/edit/<?php print $carrier->nid; ?>" rel="lightframe">
                <span class="orange-font">
                  <?php print $carrier->title; ?>
                </span>
              </a>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $carrier->field_primary_contact_value; ?>
              </span>
            </td>
            <td>
              <span class="email light-gray-font" title="<?php print $carrier->field_email_value; ?>">
                <?php print $carrier->field_email_value; ?>
              </span>
            </td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($mm, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($lm, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($td, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($mc, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($dt, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($vs, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($lf, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($sd, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($sb, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
            <td class="be-dot-td"><span class="dot-priority <?php (in_array($rm, $carrier->benefits)) ? print 'green' : print 'gray'; ?>"></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
