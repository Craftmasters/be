<div id="producer-acct-page-1">
  <?php print render($form['form_title']); ?>

  <div class="row">
    <?php if($form['#is_individual']): ?>
    <h4 class="producer-title"><?php print t('Individual Account'); ?></h4>
    <?php else: ?>
    <h4 class="producer-title"><?php print t('Company Producer Account'); ?></h4>
    <?php endif; ?>

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
  
  <?php if(!$form['#is_individual']): ?>
    <div class="row">
      <div class="col-md-6">
        <label for="edit-producer-company">Company Name</label>
        <?php print render($form['producer_company']); ?>
      </div>
      <div class="col-md-6">
        <label for="edit-producer-website">Website</label>
        <?php print render($form['producer_website']); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php /*
  <div class="single-row-check-box">
    <?php print render($form['read_sca_dba']); ?>
    <label for="edit-read-sca-dba">I have read the <a href="#" class="producer-acct-link">SCA</a> and <a href="#" class="producer-acct-link">DBA</a> documents.</label>
  </div>
  */
  ?>
  <div class="single-row-check-box">
    <?php print render($form['agree_terms_privacy']); ?>
    <label for="edit-agree-terms-privacy">I agree to Bullseye <a href="#" class="producer-acct-link" data-toggle="modal" data-target="#producer-acct-terms-link">Terms</a> & <a href="#" class="producer-acct-link" data-toggle="modal" data-target="#producer-acct-terms-link">Privacy</a> Policy.</label>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="producer-acct-terms-link" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

<p>Please read the Terms of Use and Privacy Policy of Bullseye marketing Platform by Archer Jordan. IF YOU DO NOT AGREE TO THESE TERMS, YOU SHOULD IMMEDIATELY DISCONTINUE YOUR USE OF THIS WEBSITE.</p>
  
          <div class="body-tabs-container">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#terms" aria-controls="terms" role="tab" data-toggle="tab">Terms of Use</a></li>
              <li role="presentation"><a href="#privacy" aria-controls="privacy" role="tab" data-toggle="tab">Privacy Policy</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="terms">
<p><strong>Archer Jordan Insurance Agency, Inc. (AJIA)</strong> and its parent company ("<strong>AJIA Group</strong>") made the <strong>BULLSEYE MARKETING PLATFORM</strong> site (the "Web Site") available. All content, information and software provided on and through the Web Site ("Content") may be used solely under the following terms and conditions ("Terms of Use").
<strong>BY CHECKING “I AGREE TO BULLSEYE TERMS OF USE AND PRIVACY POLICY”  CONSTITUTES YOUR ACCEPTANCE OF THE WEB SITE TERMS AND CONDITIONS. IF YOU DO NOT AGREE TO THESE TERMS, YOU SHOULD IMMEDIATELY DISCONTINUE YOUR USE OF THIS WEB SITE.</strong></p>

<ol>
  <li><strong>Web Site License</strong>. As a user of this Web Site you are granted a nonexclusive, non-transferable, revocable, limited license to access and use the Web Site and Content in accordance with these Terms of Use. <strong>AJIA</strong> may terminate this license at any time for any reason.</li>
  <li><strong>Limitations on Use</strong>. The Content on this Web Site is for personal use only and not for commercial exploitation. You may use this site for your own personal use or your organization's internal use only. You may not decompile, reverse engineer, disassemble, rent, lease, loan, sell, sublicense, or create derivative works from the Web Site or the Content. Nor may you use any network monitoring or discovery software to determine the site architecture, or extract information about usage or users. You may not use any robot, spider, or other automatic or manual device or process to monitor or copy the Web Site or the Content without <strong>AJI</strong>A's prior written permission. You may not print, download, copy, modify, reproduce, republish, distribute, display, or transmit for commercial, non-profit or public purposes all or any portion of the Web Site, except to the extent permitted above. You may not use or otherwise export or re-export the Web Site or any portion thereof, the Content or any software available on or through the Web Site in violation of the export control laws and regulations of the United States of America. Any unauthorized use of the Web Site or the Content is prohibited.</li>
  <li><strong>Not Professional advice</strong>. The Web Site and the Content do not constitute accounting, consulting, investment, legal, tax or any other type of professional advice, and should be used only in conjunction with the services of a <strong>AJIA</strong> consultant and any other appropriate professional advisors who have full knowledge of the user's situation. The accuracy, completeness, adequacy or currency of the Web Site or the Content is not warranted or guaranteed. Your use of the Content, the Web Site, or materials linked from the Web Site is at your own risk.</li>
  <li><strong>Intellectual Property Rights</strong>. All Content unless otherwise indicated is protected by law, including, but not limited to, United States copyright, trade secret, and trademark law, as well as other state, national, and international laws and regulations. Except as expressly provided in this Terms of Use or the Site,<strong>AJIA</strong> does not grant any express or implied rights to you under any patent, copyright, trademark, or trade secret information. Accordingly, any unauthorized use of the Web Site or the Content may violate copyright laws, trademark laws, trade secret laws, or laws relating to privacy and publicity.<br/>
By submitting content to a forum or any other portion of the Web Site, you automatically grant <strong>AJIA</strong> a royalty-free, perpetual, irrevocable, non-exclusive right and license to use, reproduce, modify, adopt, publish, edit (for length or clarity), translate, create derivative works from, distribute, redistribute, transmit, perform and display such content (in whole or in part) worldwide and/or to incorporate it in other works in any form, media or technology now know or later developed for the full term of any rights that my exist in such content. <strong>AJIA</strong> reserves the right to remove any content submitted to the Web Site at any time for any reason.</li>
  <li><strong>registration</strong>. Certain sections of the Web Site require you to register. If registration is requested, you agree to supply <strong>AJIA</strong> with accurate and complete registration information. It is your responsibility to inform <strong>AJIA</strong> of any changes to that information. You are responsible for maintaining the confidentiality of your account number and/or password. You are responsible for all uses of your account, whether or not actually or expressly authorized by you. <strong>AJIA</strong> reserves the right to refuse registrations or subscriptions.</li>
  <li><strong>Errors and Corrections</strong>. <strong>AJIA</strong> does not represent or warrant that the Web Site will be error-free, free of viruses or other harmful components, or that defects will be corrected. <strong>AJIA</strong> does not warrant or represent that the Content and any information available on or through the Web Site will be correct, accurate, timely, or otherwise reliable. <strong>AJIA</strong> may make changes to the Content or the Web Site at any time.</li>
  <li><strong>Third-Party Content</strong>. Third-party content may appear on or be accessible from the Web Site. <strong>AJIA</strong> is not responsible for and assumes no liability for any third-party content.</li>
  <li><strong>DISCLAIMER</strong>. THE WEB SITE AND THE CONTENT IS PROVIDED ON AN "AS-IS" BASIS. <strong>AJIA</strong>EXPRESSLY DISCLAIMS ALL WARRANTIES, INCLUDING THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. <strong>AJIA</strong> DISCLAIMS ALL RESPONSIBILITY FOR ANY LOSS, INJURY, CLAIM, LIABILITY, OR DAMAGE OF ANY KIND RESULTING FROM, ARISING OUT OF OR ANY WAY RELATED TO: (A) ANY ERRORS IN OR OMISSIONS FROM THIS WEB SITE AND THE CONTENT, INCLUDING BUT NOT LIMITED TO TECHNICAL INACCURACIES AND TYPOGRAPHICAL ERRORS; (B) ANY THIRD-PARTY WEB SITES OR CONTENT THEREIN DIRECTLY OR INDIRECTLY ACCESSED THROUGH LINKS IN THIS WEB SITE, INCLUDING BUT NOT LIMITED TO ANY ERRORS IN OR OMISSIONS THEREFROM; (C) THE UNAVAILABILITY OF THE WEB SITE OR ANY PORTION THEREOF; (D) YOUR USE OF THIS WEB SITE; OR (E) YOUR USE OF ANY EQUIPMENT OR SOFTWARE IN CONNECTION WITH THE WEB SITE.</li>
  <li><strong>LIMITATION OF LIABILITY</strong>. <strong>AJIA</strong> SHALL NOT BE LIABLE FOR ANY LOSS, INJURY, CLAIM, LIABILITY, OR DAMAGE OF ANY KIND RESULTING FROM YOUR USE OF THE WEB SITE OR THE CONTENT. <strong>AJIA</strong> SHALL NOT BE LIABLE FOR ANY SPECIAL, DIRECT, INDIRECT, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY KIND WHATSOEVER (INCLUDING, WITHOUT LIMITATION, ATTORNEYS' FEES) IN ANY WAY DUE TO, RESULTING FROM, OR ARISING IN CONNECTION WITH THE USE OF OR INABILITY TO USE THE WEB SITE OR THE CONTENT. TO THE EXTENT THE FOREGOING LIMITATION OF LIABILITY IS PROHIBITED, <strong>AJI</strong>A's SOLE OBLIGATION TO YOU FOR DAMAGES SHALL BE LIMITED TO $1,000.00 USD.</li>
  <li><strong>Unlawful Activity</strong>. <strong>AJIA</strong> reserves the right to investigate complaints or reported violations of the Terms of Use and to take any action we deem appropriate.</li>
  <li><strong>Remedies for Violations</strong>. <strong>AJIA</strong> reserves the right to seek all remedies available at law and in equity for violations of these Terms of Use, including but not limited to the right to block access from a particular Internet address to the <strong>AJI</strong>A's Web sites and their features.</li>
  <li><strong>Governing Law and Jurisdiction</strong>. These Terms of Use have been made in and shall be construed and enforced in accordance with California law without regard to the conflict of law provisions thereof. Any action to enforce this agreement shall be brought in the appropriate United States federal or local courts with jurisdiction in Los Angeles, CA.</li>
  <li><strong>Privacy</strong>. Your use of the Web Site is subject to <strong>AJI</strong>A's Privacy Policy, which is available on <strong>AJI</strong>A's Web Site.</li>
  <li><strong>Severability of Provisions</strong>. These Terms of Use incorporate by reference any notices contained on the Web Site and the Privacy Policy. These terms constitute the entire agreement between you and <strong>AJIA</strong> with respect to access to, and use of, the Web Site. If any provision of these Terms of Use is unlawful, void or unenforceable, or conflicts with any other provision of the Terms of Use then the unlawful, void, unenforceable or conflicting provision shall be deemed severable from the remaining provisions and shall not affect their validity and enforceability.</li>
  <li><strong>Modifications to Terms of Use</strong>. <strong>AJIA</strong> reserves the right to change these Terms of Use at any time. Updated versions of the Terms of Use will appear on this Web Site and are effective immediately. You are responsible for regularly reviewing the Terms of Use. Continued use of the Web Site after any such changes constitutes your acceptance of such changes.<br/>
  &copy; Archer Jordan (2012). All rights reserved.</li>
</ol>

<p>No part of this site may be reproduced or transmitted in any form or by any means, electronic or mechanical, which includes but is not limited to facsimile transmission, photocopying, recording, rekeying or using any information storage or retrieval system, without express written permission from the copyright owner. Requests for permission or further information should be directed to the Webmaster at: <a href="mailto:info@archerjordan.com" target="_blank">info@archerjordan.com</a></p>
              </div>
              <div role="tabpanel" class="tab-pane" id="privacy">
<p><strong>Archer Jordan Insurance Agency, Inc. (AJIA)</strong> and its parent company ("<strong>AJIA GROUP</strong>", "we", "our", "us") are committed to protecting the privacy of the users ("you", "your") of the <strong>BULLSEYE MARKETING PLATFORM</strong> site ("Web Site"). We collect personally identifiable information about you only with your permission.</p>
<p><strong>Collection of personal information</strong>: In some cases, such as to participate in surveys, apply for employment or to contact us through our Web Site, we ask you for personal information. The information collected is related to the purpose, and includes your name, contact information, and (if applying for employment), relevant information about your qualifications.</p>
<p><strong>Security</strong>: We will use appropriate, commercially reasonable safeguards to maintain the confidentiality of your personal information. We will take appropriate technical and organizational measures to protect your personal information against (a) accidental or unlawful destruction, (b) accidental loss and (c) unauthorized alteration, disclosure or access. Any data we collect may be transferred internationally throughout <strong>AJIA</strong> for the purposes for which it was collected.</p>
<p><strong>Customization</strong>: Some areas of the Web Site can be customized according to user preferences. We use individual preferences to deliver custom content online and analyze aggregate preferences in order to improve site quality.</p>
<p><strong>Publication orders</strong>: If a user orders a publication, their personal information will be used to fulfill the order, and may be shared with third parties involved in fulfilling the order (a printer, for instance).</p>
<p><strong>Event registration</strong>: If a user registers for an event online, their personal information will be used to fulfill that request, and may be shared with third parties involved with the event (a hotel, for instance).</p>
<p><strong>Online job applications</strong>: separate notices and policies are provided to prospective job applicants relating the use and processing of job applicant data.</p>
<p><strong>E-mail</strong>: If you send an e-mail message to us, we will use your e-mail address and other information you provide to respond to your request.</p>
<p><strong>Subscriptions</strong>: If you subscribe to one of our online publications, we use the information you provide to send you e-mail updates. You can unsubscribe at any time by contacting our Webmaster whose details are provided below.</p>
<p><strong>Surveys</strong>: The information we collect in online surveys is used for internal research purposes. In general, we do not divulge individual responses to surveys except for participant names. Exceptions to this policy are noted when users access particular surveys. On occasions, we may share responses with a co-sponsor who works with us to analyze the data; in this case, we expect the cosponsor to maintain the same level of confidentiality and security as employed by <strong>AJIA</strong>.</p>
<p><strong>Cookies</strong>. A cookie is a text-only string of information stored on a user's hard drive that allows a Web Site to remember them. For general users of the site, cookies are used only during a user session (to maintain a shopping cart, for instance) and are then deleted. We do use persistent cookies to identify users who take advantage of the customization features of the site and to save this identification between site visits.</p>
<p><strong>Third parties</strong>. We do not sell or share personal information with third parties for their own separate use. Rather, data may be shared with third parties retained by <strong>AJIA</strong> for purposes of fulfilling their obligations to <strong>AJIA</strong> only.</p>
<p><strong>Accessing and Updating</strong>: If your personal information changes or if you no longer wish to receive a service, please let the Webmaster know by e-mailing <a href="mailto:info@archerjordan.com">info@archerjordan.com</a> we will correct, update or remove your details. You are entitled to see the information held about you. If you wish to do this, please contact us.</p>
<p><strong>Modification</strong>: This privacy policy is subject to change. All changes will be posted on this Web Site and shall apply to information provided on or after the date of posting.</p>
<p>If you have any questions about <strong>AJIA's</strong> privacy practices, please contact our Webmaster at:</p>
<p>1187 Coast Village Road, Ste. 507<br/>
Santa Barbara, CA 93108<br/>
USA</p>
<p>E-mail: <a href="mailto:info@archerjordan.com">info@archerjordan.com</a></p>
              </div>
            </div>

            <!-- <div class="terms-tab" style="max-height: 500px; overflow: auto;"></div> -->

            <div class="privacy-tab" style="max-height: 500px; overflow: auto;">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button id="agree-btn" type="button" class="btn btn-default orange-btn" data-dismiss="modal">I Agree</button>
          <button type="button" class="btn btn-default gray-btn" data-dismiss="modal">No Thanks</button>
        </div>
      </div>
      
    </div>
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
      <span class="producer-file-name-life"></span>
      <?php print render($form['file_health_life']); ?>
    </div>
  </div>

  <div class="producer-acct-check producer-acct-omission-insurance">
    <div class="check-icon-gray"></div>
    <div class="producer-acct-file-field-wrapper">
      <label for="edit-file-error-omission-insurance" class="producer-acct-file-label">Upload a copy of Errors and Omission Insurance</label>
      <span class="producer-file-name-omission"></span>
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
$('label[for="edit-file-health-life-upload"]').click(function(e){
  e.preventDefault();
  $('input#edit-file-health-life-upload').click();
})

/*$('#edit-file-health-life-upload').change(function(e) {
  alert($(this).val());
  if ($(this).val() != '') {
      //$('.avatar-filename').html('Chosen file: ' + $(this).val().replace(/.*[\/\\]/, ''));
    $('.producer-acct-health-life .check-icon-gray').addClass('check-icon-green');
    $('.producer-acct-health-life').removeClass('check-icon-gray');
  }
});*/

$('label[for="edit-file-error-omission-insurance-upload"]').click(function(e){
  e.preventDefault();
  $('input#edit-file-error-omission-insurance-upload').click();
})
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

var agreeBtn = $('#agree-btn');
agreeBtn.click(function(e){
  $('#edit-agree-terms-privacy').prop('checked', true);
})

agreements.click(function(e){
  agreementCheck.children('.check-icon-gray').removeClass('check-icon-gray').addClass('check-icon-green');
  hasAgreed = true;
  return true;
});
var healthLife = $('input#edit-file-health-life-upload');
var healthLifeCheck = $('.producer-acct-check.producer-acct-health-life');
healthLife.change(function (e){
  var file = $(this).val();
  if(file){
    hasHealthLife = true;
    healthLifeCheck.children('.check-icon-gray').removeClass('check-icon-gray').addClass('check-icon-green');
    healthLifeCheck.children('.producer-file-name').html('Chosen file: ' + file.replace(/.*[\/\\]/, ''));
    $('.producer-file-name-life').html('Chosen file: ' + file.replace(/.*[\/\\]/, ''));
  }
  else{
    hasHealthLife = false;
  }
});
var omission = $('input#edit-file-error-omission-insurance-upload');
var omissionCheck = $('.producer-acct-check.producer-acct-omission-insurance');
omission.change(function (e){
  var file = $(this).val();
  
  if(file){
    hasOmission = true;
    omissionCheck.children('.check-icon-gray').removeClass('check-icon-gray').addClass('check-icon-green');
    $('.producer-file-name-omission').html('Chosen file: ' + file.replace(/.*[\/\\]/, ''));
  }
  else{
    hasOmission = false;
    hasMissingUpload++;
  }
});

var form = $('#bullseye-producer-acct-indiv-form');
form.submit(function(e) {
  return true;
  // if(hasAgreed && hasHealthLife && hasOmission){
  // }
  // else{
  //   e.preventDefault();
  //   alert('Please see the link to the agreement and upload necessary documents.');
  // }
});

});  
</script>
