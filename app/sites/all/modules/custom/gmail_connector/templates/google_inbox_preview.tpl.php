<?php
/**
 * @file
 * Template file of gmail inbox page.
 */
?>
<button id="authorize-button" class="btn btn-primary hidden email-send">Authorize</button>
<button id="send-button" class="btn btn-primary hidden email-send" data-toggle="modal" data-target="#message-modal-compose">Compose</button>
<table id="google-inbox" class="display" cellspacing="0" width="100%">
</table>




<div class="modal fade" id="message-modal-compose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Compose Your Email.
                </h4>
            </div>
            <div class="modal-body">
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <div id="model-email-success" class="alert-box success" style="display: none"><span>success: </span>Your Mail Successfully Sent.</div>
                            </div>
                            <div class="form-group">
                                <label for="to">To:</label>
                                <input type="email" class="form-control" id="email-to">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="email-subject">
                            </div>
                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea class="form-control" rows="5" id="email-body"></textarea>
                            </div>
                        </form>
                        <button id="email-send" class="btn btn-default email-send">Send</button>
                </iframe>
            </div>
        </div>
    </div>
</div>
