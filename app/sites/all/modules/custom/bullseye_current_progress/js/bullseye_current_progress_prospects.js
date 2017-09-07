/**
 * @file
 * A JavaScript file for bullseye_current_progress module.
 */

(function ($, Drupal, window, document) {

  'use strict';

  // To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.bullseye_current_progress = {
    attach: function (context, settings) {

      $(document).ready(function() {
        var nid = $('.current-progress-main').attr('node-id');

        // Refresh classes of current progress block.
        function refreshClasses(nid) {
          $.ajax({
            url: '/be-cp/refresh-classes-prospects',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              $('#div-engage').removeClass('gray-check no-check green-check');
              $('#div-se').removeClass('current-step done-step');
              $('#div-br').removeClass('current-step done-step');
              $('#div-rf').removeClass('current-step done-step');
              $('#div-cto').removeClass('gray-check no-check green-check');

              $('#div-engage').addClass(result['class_engagement']);
              $('#div-se').addClass(result['class_send_email_campaign']);
              $('#div-br').addClass(result['class_build_rapport']);
              $('#div-rf').addClass(result['class_receive_feedback']);
              $('#div-cto').addClass(result['class_convert_to_opportunity']);

              $('#div-br a.cp-link').attr('data-toggle', result['modal_access_br']);
              $('#div-rf a.cp-link').attr('data-toggle', result['modal_access_rf']);
              $('#div-cto a.cp-link').attr('data-toggle', result['modal_access_cto']);
            },
          });
        }

        // Prospect - Engagement - Receive Feedback
        $('#btn-receive-feedback').click(function() {
          $.ajax({
            url: '/be-cp/receive-feedback',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
            },
          });
        });
        
        // Prospect - Engagement - Convert to opportunity
        $('#btn-convert-to-opportunity').click(function() {
          $.ajax({
            url: '/be-cp/convert-to-opportunity',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
            },
          });
        });

        // Prospect - Engagement - Prospect interested - no
        $('#btn-prospect-interested-no').click(function() {
          $.ajax({
            url: '/be-cp/prospect-interested-no',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
            },
          });
        });

        $('.be-bs-modal').on('hidden.bs.modal', function () {
          refreshClasses(nid);
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);