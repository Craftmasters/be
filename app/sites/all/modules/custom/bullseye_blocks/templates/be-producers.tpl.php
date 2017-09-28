<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-8">
        <span class="account-count"><?php print t('All Producers (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/producer/add" rel="lightframe"><?php print t('Add New Producer'); ?></a>
        <a class="be-table-button" href="/producers/pending"><?php print t('View Pending Requests'); ?></a>
      </div>
      <div class="col-md-4">
        <div class="be-table-right-icons">
          <a href="#"><img src="<?php print $magnifying_glass; ?>"></a>
          <?php if ($delete_producer) : ?>
            <a href="/producers/delete?&ids=" rel="lightframe" id="delete-producers-link">
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
          <th class="td-width-80px"><?php print t('ID'); ?></th>
          <th><?php print t('Producer Name'); ?></th>
          <th><?php print t('Primary Contact'); ?></th>
          <th class="email"><?php print t('Email Address'); ?></th>
          <th class="td-width-80px"><?php print t('Leads Assigned'); ?></th>
          <th class="td-width-80px"><?php print t('Opportunities Covered'); ?></th>
          <th class="td-width-80px"><?php print t('Deals Closed'); ?></th>
          <th class="td-width-80px"><?php print t('Win Ratio'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($producers as $producer): ?>
          <tr>
            <td class="cell-check">
              <input class="be-table-checkbox" type="checkbox" value="<?php print $producer->uid; ?>">
            </td>
            <td class="td-width-80px">
              <a class="light-gray-font" href="/producer/edit/<?php print $producer->uid; ?>" rel="lightframe">
                <?php print $producer->uid; ?>
              </a>
            </td>
            <td>
              <a class="orange-font" href="/producer/edit/<?php print $producer->uid; ?>" rel="lightframe">
                <?php if ($producer->field_producer_type_value == 'individual') : ?>
                  <?php print $producer->field_first_name_value . ' ' . $producer->field_last_name_value; ?>
                <?php else: ?>
                  <?php print $producer->field_producer_name_value; ?>
                <?php endif; ?>
              </a>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $producer->field_primary_contact_value; ?>
              </span>
            </td>
            <td>
              <span class="email light-gray-font">
                <?php print $producer->mail; ?>
              </span>
            </td>
            <td class="td-width-80px">
              <span class="gray-font">
                <?php print Bullseye::getLeadsAssigned($producer->uid); ?>
              </span>
            </td>
            <td class="td-width-80px">
              <span class="gray-font">
                <?php print Bullseye::getOpportunitiesCovered($producer->uid, TRUE); ?>
              </span>
            </td>
            <td class="td-width-80px">
              <span class="gray-font">
                <?php print Bullseye::getDealsClosed($producer->uid, TRUE); ?>
              </span>
            </td>
            <td class="td-width-80px">
              <span class="gray-font">
                <?php if (!Bullseye::winRatio($producer->uid, TRUE)): ?>
                  0.00%
                <?php else: ?>
                  <?php print Bullseye::winRatio($producer->uid, TRUE); ?>%
                <?php endif; ?>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
