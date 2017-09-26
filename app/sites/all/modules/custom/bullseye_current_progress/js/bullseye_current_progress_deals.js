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
            url: '/be-cp/refresh-classes-deals',
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

              $('#div-gta').addClass(result['class_gts']);
              $('#div-dd').addClass(result['class_dd']);
              $('#div-gsfi').addClass(result['class_gsfi']);
              $('#div-sd').addClass(result['class_sd']);
              $('#div-poa').addClass(result['class_poa']);
              $('#div-rsd').addClass(result['class_rsd']);
              $('#div-cp').addClass(result['class_cp']);
              $('#div-ctcd').addClass(result['class_ctcd']);

              $('#div-dd a.cp-link').attr('data-toggle', result['modal_access_dd']);
              $('#div-gsfi a.cp-link').attr('data-toggle', result['modal_access_gsfi']);
              $('#div-sd a.cp-link').attr('data-toggle', result['modal_access_sd']);
              $('#div-rsd a.cp-link').attr('data-toggle', result['modal_access_rsd']);
              $('#div-cp a.cp-link').attr('data-toggle', result['modal_access_cp']);
              $('#div-ctcd a.cp-link').attr('data-toggle', result['modal_access_ctcd']);

            },
          });
        }

        function refreshHeaderClasses(nid) {
          $.ajax({
            url: '/be-cp/header-classes',
            method: 'POST',
            data: {
              nid: nid,
              status: 'deal_in_progress',
            },
            success: function(result){
              console.log(result);
              $('#hp_gta').removeClass('be-blue be-gray be-green');
              $('#hp_poa').removeClass('be-blue be-gray be-green');
              $('#hp_ctcd').removeClass('be-blue be-gray be-green');
              $('#hp_gta').addClass(result['hp_gta']);
              $('#hp_poa').addClass(result['hp_poa']);
              $('#hp_ctcd').addClass(result['hp_ctcd']);
            },
          });
        };

        refreshHeaderClasses(nid);

        $('.be-bs-modal').on('hidden.bs.modal', function () {
          refreshClasses(nid);
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);