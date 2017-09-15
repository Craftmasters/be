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
        /*function refreshClasses(nid) {
          $.ajax({
            url: '/be-cp/refresh-classes-opportunity',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              $('#div-gta').removeClass('gray-check no-check green-check');
              $('#div-dd').removeClass('current-step done-step');
              $('#div-gsfi').removeClass('current-step done-step');
              $('#div-sd').removeClass('current-step done-step');
              $('#div-poa').removeClass('gray-check no-check green-check');
              $('#div-rsd').removeClass('current-step done-step');
              $('#div-cp').removeClass('current-step done-step');
              $('#div-ctcd').removeClass('gray-check no-check green-check');

              $('#div-gta').addClass(result['class_plan_specs']);
              $('#div-dd').addClass(result['class_request_specs']);
              $('#div-gsfi').addClass(result['class_receive_plan']);
              $('#div-sd').addClass(result['class_rfp']);
              $('#div-poa').addClass(result['class_generate_rfp']);
              $('#div-rsd').addClass(result['class_recieve_quote']);
              $('#div-cp').addClass(result['class_plan_presentation']);
              $('#div-ctcd').addClass(result['class_send_proposal']);

              $('#div-dd a.cp-link').attr('data-toggle', result['modal_access_rs']);
              $('#div-gsfi a.cp-link').attr('data-toggle', result['modal_access_rp']);
              $('#div-sd a.cp-link').attr('data-toggle', result['modal_access_gr']);
              $('#div-rsd a.cp-link').attr('data-toggle', result['modal_access_rq']);
              $('#div-ctcd a.cp-link').attr('data-toggle', result['modal_access_sp']);

            },
          });
        }

        $('.be-bs-modal').on('hidden.bs.modal', function () {
          refreshClasses(nid);
        });*/

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);