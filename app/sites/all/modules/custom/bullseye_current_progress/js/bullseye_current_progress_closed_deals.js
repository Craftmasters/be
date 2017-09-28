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
            url: '/be-cp/refresh-classes-cdeals',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              $('#div-migration').removeClass('gray-check no-check green-check');
              $('#div-setup').removeClass('current-step done-step');
              $('#div-congrats').removeClass('gray-check no-check green-check');

              $('#div-migration').addClass(result['class_migration']);
              $('#div-setup').addClass(result['class_setup']);
              $('#div-congrats').addClass(result['class_congrats']);

              $('#div-setup a.cp-link').attr('data-target', result['modal_access']);
              $('#div-setup a.cp-link').attr('data-toggle', result['modal_access_toggle']);

              $('.prepare-docs i').addClass(result['file_color']);

            },
          });
        }

        function refreshHeaderClasses(nid) {
          $.ajax({
            url: '/be-cp/header-classes',
            method: 'POST',
            data: {
              nid: nid,
              status: 'closed_deal',
            },
            success: function(result){
              console.log(result);
              $('#hp_migration').removeClass('be-blue be-gray be-green');
              $('#hp_congrats').removeClass('be-blue be-gray be-green');
              $('#hp_migration').addClass(result['hp_migration']);
              $('#hp_congrats').addClass(result['hp_congrats']);
            },
          });
        };

        refreshHeaderClasses(nid);

        $('.be-bs-modal').on('hidden.bs.modal', function () {
          refreshClasses(nid);
        });

        $('.prepare-docs i').each(function() {
          $(this).click(function() {
            $(this).addClass('green');
          });
        });

        $('#btn-next-mta').click(function() {
          $.ajax({
            url: '/be-cp/cd-migrate',
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

        $('#btn-next-login-arrow').click(function() {
          $.ajax({
            url: '/be-cp/cd-login-arrow',
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

        $('#btn-next-congrats').click(function() {
          $.ajax({
            url: '/be-cp/cd-congrats',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
              refreshHeaderClasses(nid);
            },
          });
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);