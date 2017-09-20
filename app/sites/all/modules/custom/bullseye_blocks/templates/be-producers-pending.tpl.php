<div class="be-table-block">
  <div class="be-table-top-header">
    <div class="row">
      <div class="col-md-6">
        <span class="account-count"><?php print t('All Requests (' . $total . ')'); ?></span>
        <a class="be-table-button" href="/producers"><?php print t('View Existing Producers'); ?></a>
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
          <th><?php print t('Name'); ?></th>
          <th><?php print t('Email Address'); ?></th>
          <th><?php print t('Phone Number'); ?></th>
          <th><?php print t('Company'); ?></th>
          <th><?php print t('Website'); ?></th>
          <th class="be-dot-td"><?php print t('Health & Life'); ?></th>
          <th class="be-dot-td"><?php print t('Errors & Omission'); ?></th>
          <th class="be-dot-td"></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($producers as $p): ?>
          <tr>
            <td class="cell-check"><input type="checkbox"></td>
            <td>
              <span class="gray-font">
                <?php if ($p->field_producer_type_value == 'individual'): ?>
                  <?php print ucfirst($p->field_first_name_value) . '  ' . ucfirst($p->field_last_name_value); ?>
                <?php else: ?>
                  <?php print $p->field_producer_name_value; ?>
                <?php endif; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font email" title="<?php print $p->mail; ?>">
                <?php print $p->mail; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php print $p->field_phone_number_value; ?>
              </span>
            </td>
            <td>
              <span class="light-gray-font">
                <?php if ($p->field_producer_type_value == 'company'): ?>
                  <?php print $p->field_producer_name_value; ?>
                <?php endif; ?>
              </span>
            </td>
            <td>
              <a class="orange-font" href="http://company.com">
                <?php print $p->field_producer_website_value; ?>
              </a>
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($p->field_health_and_life_fid); ?>"></span>
            </td>
            <td class="be-dot-td">
              <span class="<?php Bullseye::isActive($p->field_errors_omission_insurance_fid); ?>"></span>
            </td>
            <td class="be-dot-td">
              <a href="<?php Bullseye::dl($p->field_health_and_life_fid); ?>" download="<?php Bullseye::filename($p->field_health_and_life_fid); ?> " class="producer-pending-file">
                <i class="fa fa-download" aria-hidden="true"></i>
              <a>
            </td>
            <td>
              <a href="#" class="be-table-button green" data-toggle="modal" data-target="#approve-modal-1"><?php print t('Approve'); ?></a>
              <div id="approve-modal-1" class="modal be-bs-modal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-inner">
                      <div class="modal-header">
                        <a href="#" class="close" data-dismiss="modal">&times;</a>
                      </div>
                      <div class="modal-body">
                        <div class="modal-body-wrap">
                          <div class="modal-body-inner">
                            <h3><?php print t('Check if Producer Agreement document has been signed prior approval.'); ?></h3>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="be-custom-actions">
                          <button type="button" class="gray-btn" data-dismiss="modal"><?php print t('Cancel'); ?></button>
                          <button id="btn-approve-producer-1" type="button" class="green-btn approve" data-uid="<?php print $p->uid; ?>" data-toggle="modal" data-target="#producer-add-success" data-dismiss="modal"><?php print t('Approve'); ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <a href="#" class="be-table-button red" data-toggle="modal" data-target="#deny-modal-1"><?php print t('Deny'); ?></a>
              <div id="deny-modal-1" class="modal be-bs-modal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-inner">
                      <div class="modal-header">
                        <a href="#" class="close" data-dismiss="modal">&times;</a>
                      </div>
                      <div class="modal-body">
                        <div class="modal-body-wrap">
                          <div class="modal-body-inner">
                            <h3><?php print t('The producer request will be permanently removed in our system. Are you sure you want to proceed?'); ?></h3>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="be-custom-actions">
                          <button type="button" class="gray-btn" data-dismiss="modal"><?php print t('Cancel'); ?></button>
                          <button id="btn-delete-producer-1" type="button" class="green-btn delete" data-uid="<?php print $p->uid; ?>" data-dismiss="modal"><?php print t('yes'); ?></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Modal for successful adding of producer -->
    <div id="producer-add-success" class="modal be-bs-modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-inner">
            <div class="modal-header">
              <a href="#" class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body">
              <div class="modal-body-wrap">
                <div class="modal-body-inner">
                  <h3><?php print t('Producer successfully added!'); ?></h3>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="be-custom-actions">
                <button type="button" class="gray-btn" data-dismiss="modal"><?php print t('Exit'); ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
