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

        // Lead - Verification - Verify SCA/DBRA - Yes, SCA
        $('#btn-verify-yes-sca').click(function() {
          $.ajax({
            url: '/be-cp/lead/verify',
            method: 'POST',
            data: {
              nid: nid,
              sca_dbra: 'yes_sca'
            },
            success: function(result){
              console.log(result);
            },
          });
        });

        // Lead - Verification - Verify SCA/DBRA - Yes, DRA
        $('#btn-verify-yes-dbra').click(function() {
          $.ajax({
            url: '/be-cp/lead/verify',
            method: 'POST',
            data: {
              nid: nid,
              sca_dbra: 'yes_dbra'
            },
            success: function(result){
              console.log(result);
            },
          });
        });

        // Lead - Verification - Verify SCA/DBRA - BOTH
        $('#btn-verify-yes-both').click(function() {
          $.ajax({
            url: '/be-cp/lead/verify',
            method: 'POST',
            data: {
              nid: nid,
              sca_dbra: 'yes_both'
            },
            success: function(result){
              console.log(result);
            },
          });
        });

        // Lead - Verification - Verify SCA/DBRA - NO
        $('#btn-verify-no').click(function() {
          $.ajax({
            url: '/be-cp/lead/verify',
            method: 'POST',
            data: {
              nid: nid,
              sca_dbra: 'no'
            },
            success: function(result){
              console.log(result);
            },
          });
        });
          
      });
   
    }
  };

})(jQuery, Drupal, this, this.document);