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
            url: '/be-cp/refresh-classes',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log();
              $('#div-verification').removeClass('gray-check no-check green-check');
              $('#div-vsd').removeClass('current-step done-step');
              $('#div-ctg').removeClass('current-step done-step');
              $('#div-vpc').removeClass('current-step done-step');
              $('#div-sp').removeClass('current-step done-step');
              $('#div-ctp').removeClass('gray-check no-check green-check');

              $('#div-verification').addClass(result['class_verification']);
              $('#div-vsd').addClass(result['class_verify_sca_dbra']);
              $('#div-ctg').addClass(result['class_classify_to_group']);
              $('#div-vpc').addClass(result['class_validate_point_of_contact']);
              $('#div-sp').addClass(result['class_set_priority']);
              $('#div-ctp').addClass(result['class_convert_to_prospect']);

              $('#div-vsd a.cp-link').attr('data-toggle', result['modal_access_vsd']);
              $('#div-ctg a.cp-link').attr('data-toggle', result['modal_access_ctg']);
              $('#div-vpc a.cp-link').attr('data-toggle', result['modal_access_vpc']);
              $('#div-sp a.cp-link').attr('data-toggle', result['modal_access_sp']);
              $('#div-ctp a.cp-link').attr('data-toggle', result['modal_access_ctp']);

            },
          });
        }

        function refreshHeaderClasses(nid) {
          $.ajax({
            url: '/be-cp/header-classes',
            method: 'POST',
            data: {
              nid: nid,
              status: 'lead',
            },
            success: function(result){
              console.log(result);
              $('#hp_verification').removeClass('be-blue be-gray be-green');
              $('#hp_convert_to_prospect').removeClass('be-blue be-gray be-green');
              $('#hp_verification').addClass(result['hp_verification']);
              $('#hp_convert_to_prospect').addClass(result['hp_convert_to_prospect']);
            },
          });
        }

        function refreshCheckboxEvents() {
          $('table.table-vc input[type="checkbox"]').each(function() {
            $(this).change(function() {
              if ($(this).is(':checked')) {
                $('table.table-vc input[type="checkbox"]').val('no');
                $('table.table-vc input[type="checkbox"]').prop('checked', false);
                $(this).prop('checked', true);
                $(this).val('yes');
              }
              else {
                $(this).val('no');
              }
            });
          });
        }

        refreshCheckboxEvents();
        refreshHeaderClasses(nid);

        // function to get value of paramater from url.
        var getUrlParameter = function getUrlParameter(sParam) {
          var sPageURL = decodeURIComponent(window.location.search.substring(1)),
              sURLVariables = sPageURL.split('&'),
              sParameterName,
              i;

          for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
              return sParameterName[1] === undefined ? true : sParameterName[1];
            }
          }
        };

        // Check page if it is from lead unqualified modal.
        var from_unqualified = getUrlParameter('unqualified');
        if (from_unqualified) {
          $('#lead-unqualified').modal('show');
        }

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
              refreshClasses(nid);
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
              refreshClasses(nid);
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
              refreshClasses(nid);
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
              refreshClasses(nid);
            },
          });
        });

        $('#btn-plan-sca-dbra-no').click(function() {
          $.ajax({
            url: '/be-cp/unqualified',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
            },
          });
        });

        $('#btn-save-exit-lu').click(function() {
          window.location.reload(true);
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

        $('#btn-save-exit-ctg').click(function() {
          var tags_value = $('#edit-field-tags-und').val();
          $.ajax({
            url: '/be-cp/save-exit-ctg',
            method: 'POST',
            data: {
              nid: nid,
              tags_value: tags_value
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
            },
          });
        });

        // Lead - Verification - Validate point of contact
        $('#btn-validate-point-of-contact').click(function() {
          var tags_value = $('#edit-field-tags-und').val();
          $.ajax({
            url: '/be-cp/lead/validate-point-of-contact',
            method: 'POST',
            data: {
              nid: nid,
              tags_value: tags_value
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
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
                refreshCheckboxEvents();
              },
            });
          });
        });

        // Add button for validate point of contact phase.
        $('#add-contact').click(function() {
          var random_num = Math.floor((Math.random() * 10000000) + 1);
          var checkbox_td = '<td><input type="checkbox" class="con-pc" value="no"></td>';
          var lastname_td = '<td><input type="text" class="con-lastname" value=""></td>';
          var firstname_td = '<td><input type="text" class="con-firstname" value=""></td>';
          var position_td = '<td><input type="text" class="con-position" value=""></td>';
          var phone_td = '<td><input type="text" class="con-phone" value=""></td>';
          var email_td = '<td><input type="text" class="con-email" value=""></td>';
          var delete_td = '<td><button type="button" class="con-delete-new"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
          var tr = '<tr class="new-data" tr-num="' + random_num + '">' + checkbox_td + firstname_td + lastname_td + position_td + phone_td + email_td + delete_td + '</tr>';
          $('table.table-vc tbody').append(tr);

          $('tr[tr-num="' + random_num + '"] button.con-delete-new').click(function() {
            $(this).closest('tr').remove();
          });
          refreshCheckboxEvents();
        });

        // Delete event for delete button in validate point of contact phase.
        $('.con-delete-new').click(function() {
          $(this).closest('tr').remove();
        });

        // Lead - Verification - VPC - save and exit
        $('#btn-save-exit-vpc').click(function() {
          // Get the contacts data.
          var contacts = [];
          $('.table-vc .new-data').each(function() {
            var obj = {
              'primary_contact': $(this).find('.con-pc').val(),
              'firstname': $(this).find('.con-firstname').val(),
              'lastname': $(this).find('.con-lastname').val(),
              'position' : $(this).find('.con-position').val(),
              'phone' : $(this).find('.con-phone').val(),
              'email' : $(this).find('.con-email').val(),
            };
            contacts.push(obj);
          });

          var old_contacts = [];
          $('.table-vc .old-data').each(function() {
            var obj = {
              'primary_contact': $(this).find('.con-pc').val(),
              'firstname': $(this).find('.con-firstname').val(),
              'lastname': $(this).find('.con-lastname').val(),
              'position' : $(this).find('.con-position').val(),
              'phone' : $(this).find('.con-phone').val(),
              'email' : $(this).find('.con-email').val(),
              'id': $(this).attr('contact-id'),
            };
            old_contacts.push(obj);
          });

          // Saving the contacts.
          $.ajax({
            url: '/be-cp/save-exit-vpc',
            method: 'POST',
            data: {
              nid: nid,
              contacts: contacts,
              old_contacts: old_contacts,
            },
            success: function(result){
              console.log(result);
              $.each(result, function(i, item) {
                $('tr.new-data').eq(i).attr('contact-id', item);
                $('tr.new-data').eq(i).addClass('old-data');
                $('tr.new-data').eq(i).removeAttr('tr-num');
              });

              // Binding delete event to newly added elements.
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

              refreshCheckboxEvents();
              refreshClasses(nid);
            },
          });
        });

        // Lead - Verification - Set Priority
        $('#btn-set-priority').click(function() {
          // Get the contacts data.
          var contacts = [];
          $('.table-vc .new-data').each(function() {
            var obj = {
              'primary_contact': $(this).find('.con-pc').val(),
              'firstname': $(this).find('.con-firstname').val(),
              'lastname': $(this).find('.con-lastname').val(),
              'position' : $(this).find('.con-position').val(),
              'phone' : $(this).find('.con-phone').val(),
              'email' : $(this).find('.con-email').val(),
            };
            contacts.push(obj);
          });

          var old_contacts = [];
          $('.table-vc .old-data').each(function() {
            var obj = {
              'primary_contact': $(this).find('.con-pc').val(),
              'firstname': $(this).find('.con-firstname').val(),
              'lastname': $(this).find('.con-lastname').val(),
              'position' : $(this).find('.con-position').val(),
              'phone' : $(this).find('.con-phone').val(),
              'email' : $(this).find('.con-email').val(),
              'id': $(this).attr('contact-id'),
            };
            old_contacts.push(obj);
          });

          // Setting the new status of account to set priority.
          $.ajax({
            url: '/be-cp/setpriority',
            method: 'POST',
            data: {
              nid: nid,
              contacts: contacts,
              old_contacts: old_contacts
            },
            success: function(result){
              console.log(result);
              $.each(result, function(i, item) {
                $('tr.new-data').eq(i).attr('contact-id', item);
                $('tr.new-data').eq(i).addClass('old-data');
                $('tr.new-data').eq(i).removeAttr('tr-num');
              });

              // Binding delete event to newly added elements.
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

              refreshCheckboxEvents();
              refreshClasses(nid);
            },
          });
        });

        // Lead - Verification - Convert to prospect
        $('#btn-save-exit-sp').click(function() {
          var priority = $('#edit-priority').val();
          $.ajax({
            url: '/be-cp/save-exit-sp',
            method: 'POST',
            data: {
              nid: nid,
              priority: priority
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
            },
          });
        });

        // Lead - Verification - Convert to prospect
        $('#btn-convert-to-prospect').click(function() {
          var priority = $('#edit-priority').val();
          $.ajax({
            url: '/be-cp/convert-to-prospect',
            method: 'POST',
            data: {
              nid: nid,
              priority: priority
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
              refreshHeaderClasses(nid);
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

        $('.be-bs-modal').on('hidden.bs.modal', function () {
          refreshClasses(nid);
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);