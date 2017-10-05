<?php
/**
 * @file
 * Template file of gmail inbox page.
 */
?>
<button id="authorize-button" class="btn btn-primary hidden email-send">
  <?php print t('Authorize'); ?>
</button>
<!--<button id="send-button" class="btn btn-primary hidden email-send" data-toggle="modal" data-target="#message-modal-compose">
  <?php //print t('Compose'); ?>
</button>-->
<table id="google-inbox" class="display" cellspacing="0" width="100%">
</table>

<div class="modal fade" id="message-modal-compose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">
          <?php print t('Compose Your Email'); ?>.
        </h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <div id="model-email-success" class="alert-box success" style="display: none">
              <span>success: </span><?php print t('Your Mail Successfully Sent'); ?>.
            </div>
          </div>
          <div class="form-group">
            <label for="to"><?php print t('To'); ?>:</label>
            <input type="email" class="form-control" id="email-to">
          </div>
          <div class="form-group">
            <label for="subject"><?php print t('Subject'); ?>:</label>
            <input type="text" class="form-control" id="email-subject">
          </div>
          <div class="form-group">
            <label for="body"><?php print t('Body'); ?>:</label>
            <textarea class="form-control" rows="5" id="email-body"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="email-send" class="btn btn-default email-send"><?php print t('Send'); ?></button>
      </div>
    </div>
  </div>
</div>
