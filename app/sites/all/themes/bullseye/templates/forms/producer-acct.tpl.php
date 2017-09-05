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
        <label for="edit-producer-email">Email Address</label>
        <?php print render($form['producer_email']); ?>
      </div>
      <div class="col-md-6">
        <label for="edit-producer-phone">Phone</label>
        <?php print render($form['producer_phone']); ?>
      </div>
    </div>
  </div>
  <?php // @todo add if is company page add company fields ?>

  <?php /* temporary static checkbox placeholder */ ?>
  <?php /*
  <div class="single-row-check-box">
    <?php print render($form['read_sca_dba']); ?>
    <label for="edit-read-sca-dba">I have read the <a href="#" class="producer-acct-link">SCA</a> and <a href="#" class="producer-acct-link">DBA</a> documents.</label>
  </div>
  */
  ?>
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
<div id="producer-acct-page-2" style="display: none;">
  <h4 class="producer-title">You’re almost done!<br/>
A few more things to wrap this up.</h4>

  <div class="producer-acct-check producer-acct-aggreement">
    <div class="check-icon-gray"></div>
    <div class="producer-acct-file-field-wrapper">
      <label for="producer-acct-petition" class="producer-acct-file-label">Sign the Producer Agreement</label>
      <a id="producer-acct-petition" href="<?php print render($form['sign_petition']); ?>" target="_blank" class="button orange-btn square-btn">Link to Agreement</a>
    </div>
  </div>

  <div class="producer-acct-check producer-acct-health-life">
    <div class="check-icon-gray"></div>
    <div class="producer-acct-file-field-wrapper">
      <label for="edit-file-health-life" class="producer-acct-file-label">Upload a copy of current Health and Life</label>
      <?php print render($form['file_health_life']); ?>
    </div>
  </div>

  <div class="producer-acct-check producer-acct-omission-insurance">
    <div class="check-icon-gray"></div>
    <div class="producer-acct-file-field-wrapper">
      <label for="edit-file-error-omission-insurance" class="producer-acct-file-label">Upload a copy of Errors and Omission Insurance</label>
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
<script type="text/javascript">
jQuery(document).ready(function($) {
$('#producer-acct-next-btn').click(function(e){
  e.preventDefault();
  // @todo: validate and check if required fields have been inputted and checked
  var inputs = $('#producer-acct-page-1').find('input.required');
  var hasNoVal = false;
  if(inputs.length > 0){
    inputs.each(function(index, value){
      input = $(value);
      if(input.is(':checkbox') && !input.is(':checked')){
        hasNoVal = true;
        return false;
      }
      else if(input.is(':text') && input.val() == ''){
        hasNoVal = true;
        return false;
      }
    });
  }

  if(hasNoVal){
    alert('Please complete and check all the fields.');
  }
  else{
    $('#producer-acct-page-1').hide();
    $('#producer-acct-page-2').show();
  }
  return false;
});

var hasAgreed = false;
var hasHealthLife = false;
var hasOmission = false;
var agreements = $('#producer-acct-petition');
var agreementCheck = $('.producer-acct-check.producer-acct-aggreement');
agreements.click(function(e){
  agreementCheck.children('.check-icon-gray').removeClass('check-icon-gray').addClass('check-icon-green');
  hasAgreed = true;
  return true;
});
var healthLife = $('#edit-file-health-life');
var healthLifeCheck = $('.producer-acct-check.producer-acct-health-life');
healthLife.change(function (e){
  var file = $(this).val();
  
  if(file){
    hasHealthLife = true;
    healthLifeCheck.children('.check-icon-gray').removeClass('check-icon-gray').addClass('check-icon-green');
  }
  else{
    hasHealthLife = false;
  }
});
var omission = $('#edit-file-error-omission-insurance');
var omissionCheck = $('.producer-acct-check.producer-acct-omission-insurance');
omission.change(function (e){
  var file = $(this).val();
  
  if(file){
    hasOmission = true;
    omissionCheck.children('.check-icon-gray').removeClass('check-icon-gray').addClass('check-icon-green');
  }
  else{
    hasOmission = false;
    hasMissingUpload++;
  }
});

var form = $('#bullseye-producer-acct-indiv-form');
form.submit(function(e) {
  if(hasAgreed && hasHealthLife && hasOmission){
    return true;
  }
  else{
    e.preventDefault();
    alert('Please see the link to the agreement and upload necessary documents.');
  }
});

});  
</script>
