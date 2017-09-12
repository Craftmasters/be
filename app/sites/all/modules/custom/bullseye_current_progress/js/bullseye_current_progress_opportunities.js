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
            url: '/be-cp/refresh-classes-opportunity',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              $('#div-plan-specs').removeClass('gray-check no-check green-check');
              $('#div-request-specs').removeClass('current-step done-step');
              $('#div-receive-plan').removeClass('current-step done-step');
              $('#div-rfp').removeClass('gray-check no-check green-check');
              $('#div-generate-rfp').removeClass('current-step done-step');
              $('#div-receive-quote').removeClass('current-step done-step');
              $('#div-plan-pres').removeClass('gray-check no-check green-check');
              $('#div-send-proposal').removeClass('current-step done-step');
              $('#div-receive-feedback').removeClass('current-step done-step');
              $('#div-convert-to-deals').removeClass('gray-check no-check green-check');

              $('#div-plan-specs').addClass(result['class_plan_specs']);
              $('#div-request-specs').addClass(result['class_request_specs']);
              $('#div-receive-plan').addClass(result['class_receive_plan']);
              $('#div-rfp').addClass(result['class_rfp']);
              $('#div-generate-rfp').addClass(result['class_generate_rfp']);
              $('#div-receive-quote').addClass(result['class_recieve_quote']);
              $('#div-plan-pres').addClass(result['class_plan_presentation']);
              $('#div-send-proposal').addClass(result['class_send_proposal']);
              $('#div-receive-feedback').addClass(result['class_receive_feedback']);
              $('#div-convert-to-deals').addClass(result['class_convert_deals']);

              $('#div-request-specs a.cp-link').attr('data-toggle', result['modal_access_rs']);
              $('#div-receive-plan a.cp-link').attr('data-toggle', result['modal_access_rp']);
              $('#div-generate-rfp a.cp-link').attr('data-toggle', result['modal_access_gr']);
              $('#div-receive-quote a.cp-link').attr('data-toggle', result['modal_access_rq']);
              $('#div-send-proposal a.cp-link').attr('data-toggle', result['modal_access_sp']);
              $('#div-receive-feedback a.cp-link').attr('data-toggle', result['modal_access_rf']);
              $('#div-convert-to-deals a.cp-link').attr('data-toggle', result['modal_access_cd']);

            },
          });
        }

        $('.be-bs-modal').on('hidden.bs.modal', function () {
          refreshClasses(nid);
        });

        $('#btn-receive-details').click(function() {
          $.ajax({
            url: '/be-cp/receive-details',
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

        $('#btn-next-generate-rfp').click(function() {
          $.ajax({
            url: '/be-cp/next-generate-rfp',
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

        $('#btn-send-plan-proposal').click(function() {
          $.ajax({
            url: '/be-cp/send-plan-proposal',
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

        $('#btn-accept-proposal-yes').click(function() {
          $.ajax({
            url: '/be-cp/accept-proposal-yes',
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

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);