<div id="producer-acct-page-1">
  <?php print render($form['form_title']); ?>

  <div class="row">
    <h4 class="producer-title"><?php print t('Individual Account'); ?></h4>

    <div>
      <label>Name</label>
    </div>
    <div class="row">
      <div class="col-md-6">
        <?php print render($form['producer_fname']); ?>
      </div>
      <div class="col-md-6">
        <?php print render($form['producer_lname']); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <?php print render($form['producer_email']); ?>
      </div>
      <div class="col-md-6">
        <?php print render($form['producer_phone']); ?>
      </div>
    </div>
  </div>
  <?php // @todo add if is company page add company fields ?>

  <?php /* temporary static checkbox placeholder */ ?>
  <div class="single-row-check-box">
    <?php print render($form['read_sca_dba']); ?>
    <label for="edit-read-sca-dba">I have read the <a href="#" class="producer-acct-link">SCA</a> and <a href="#" class="producer-acct-link">DBA</a> documents.</label>
  </div>
  <div class="single-row-check-box">
    <?php print render($form['agree_terms_privacy']); ?>
    <label for="edit-agree-terms-privacy">I agree to Bullseye <a href="#" class="producer-acct-link">Terms</a> & <a href="#" class="producer-acct-link">Privacy</a> Policy.</label>
    <label for="edit-agree-terms-privacy"></label>
  </div>

  <div class="button-container">
    <button class="orange-btn" id="producer-acct-next-btn">Next</button>
  </div>
</div>

<?php /* page 2 */ ?>
<div id="producer-acct-page-2">
  <h4 class="producer-title">You’re almost done!<br/>
A few more things to wrap this up.</h4>

  <div class="producer-acct-check">
    <div class="check-icon-gray"></div>
    <div class="producer-acct-file-field-wrapper">
      <a href="<?php print render($form['sign_petition']); ?>" class="button orange-btn square-btn">Link to Agreement</a>
    </div>
  </div>

  <div class="producer-acct-check">
    <div class="check-icon-gray"></div>
    <div class="producer-acct-file-field-wrapper">
    <?php print render($form['file_health_life']); ?>
    </div>
  </div>

  <div class="producer-acct-check">
    <div class="check-icon-gray"></div>
    <div class="producer-acct-file-field-wrapper">
    <?php print render($form['file_error_omission_insurance']); ?>
    </div>
  </div>

  <div class="submit-container">
  <?php print render($form['submit_container']); ?>
  </div>
</div>
<div class="hidden-container">
  <?php print drupal_render_children($form); ?>
</div>