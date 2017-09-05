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
          var contacts = [];
          $('.table-vc .new-data').each(function() {
            var obj = {
              'name': $(this).find('.con-name').val(),
              'position' : $(this).find('.con-position').val(),
              'phone' : $(this).find('.con-phone').val(),
              'email' : $(this).find('.con-email').val(),
            };
            contacts.push(obj);
          });
          $.ajax({
            url: '/be-cp/setpriority',
            method: 'POST',
            data: {
              nid: nid,
              contacts: contacts,
            },
            success: function(result){
              console.log(result);
              $.each(result, function(i, item) {
                $('tr.new-data').eq(i).attr('contact-id', item);
                $('tr.new-data').eq(i).addClass('old-data');
                $('tr.new-data').eq(i).removeAttr('tr-num');
              });
              $('tr.old-data').each(function() {
                var item_id = $(this).attr('contact-id');
                $(this).removeClass('new-data');
                $(this).find('button.con-delete-new').addClass('con-delete');
                $(this).find('button.con-delete').removeClass('con-delete-new');
                $(this).find('button.con-delete').click(function() {
                  $.ajax({
                    url: '/be-cp/delete-contact',
                    method: 'POST',
                    data: {
                      item_id: item_id,
                    },
                    success: function(result){
                      console.log(result);
                      if (result == 'success') {
                        $('tr[contact-id="' + item_id + '"]').remove();
                      }
                    },
                  });
                });
              });
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

        // Delete contact from validate point of contact phase.
        $('.con-delete').each(function() {
          $(this).click(function() {
            var item_id = $(this).closest('tr').attr('contact-id');
            $.ajax({
              url: '/be-cp/delete-contact',
              method: 'POST',
              data: {
                item_id: item_id,
              },
              success: function(result){
                console.log(result);
                if (result == 'success') {
                  $('tr[contact-id="' + item_id + '"]').remove();
                }
              },
            });
          });
        });

        $('#add-contact').click(function() {
          var random_num = Math.floor((Math.random() * 10000000) + 1);
          var name_td = '<td><input type="text" class="con-name" value=""></td>';
          var position_td = '<td><input type="text" class="con-position" value=""></td>';
          var phone_td = '<td><input type="text" class="con-phone" value=""></td>';
          var email_td = '<td><input type="text" class="con-email" value=""></td>';
          var delete_td = '<td><button type="button" class="con-delete-new">Delete</button></td>';
          var tr = '<tr class="new-data" tr-num="' + random_num + '">' + name_td + position_td + phone_td + email_td + delete_td + '</tr>';
          $('table.table-vc tbody').append(tr);

          $('tr[tr-num="' + random_num + '"] button.con-delete-new').click(function() {
            $(this).closest('tr').remove();
          });
        });

        $('.con-delete-new').click(function() {
          $(this).closest('tr').remove();
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);