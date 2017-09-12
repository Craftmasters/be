<div class="be-regular-block">
  <h2 class="be-regular-h2"><?php print t('People'); ?></h2>
  <a href="#" class="edit-link edit-account-details"><img src="<?php print $edit_icon; ?>"></a>
  <div class="be-block-main">

    <?php foreach ($people as $key => $value) : ?>
      <div class="be-user-row">
        <div class="be-user-img">
          <img src="/sites/all/themes/bullseye/images/default-user.png">
        </div>
        <div class="be-user-name orange-font"><?php print $value->field_contact_name_value; ?></div>
        <div class="be-user-position"><?php print $value->field_position_value; ?></div>
        <div class="be-user-contact">
          <a href="<?php print $value->field_phone_number_value; ?>" class="phone"><?php print $value->field_phone_number_value; ?></a> | <a href="mailto:<?php print $value->field_email_value; ?>" class="be-user-email orange-font"><?php print $value->field_email_value; ?></a>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>