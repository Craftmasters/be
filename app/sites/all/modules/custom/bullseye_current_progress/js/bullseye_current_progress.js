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

        // Lead - Verification - Plan to work SCA/DBRA - Yes
        $('#btn-plan-sca-dbra-yes').click(function() {
          $.ajax({
            url: '/be-cp/plan-work-sca-dbra',
            method: 'POST',
            data: {
              nid: nid,
              plan_to_work_sca_dbra: 'yes'
            },
            success: function(result){
              console.log(result);
            },
          });
        });

        // Lead - Verification - Plan to work SCA/DBRA - No
        $('#btn-plan-sca-dbra-no').click(function() {
          $.ajax({
            url: '/be-cp/plan-work-sca-dbra',
            method: 'POST',
            data: {
              nid: nid,
              plan_to_work_sca_dbra: 'no'
            },
            success: function(result){
              console.log(result);
            },
          });
        });

        // Lead - Verification - Validate point of contact
        $('#btn-validate-point-of-contact').click(function() {
          $.ajax({
            url: '/be-cp/lead/validate-point-of-contact',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
            },
          });
        });

        // Lead - Verification - Set Priority
        $('#btn-set-priority').click(function() {
          $.ajax({
            url: '/be-cp/setpriority',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
            },
          });
        });

        // Lead - Verification - Convert to prospect
        $('#btn-convert-to-prospect').click(function() {
          $.ajax({
            url: '/be-cp/convert-to-prospect',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
            },
          });
        });

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
            },
          });
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);