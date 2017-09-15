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

        function refreshHeaderClasses(nid) {
          $.ajax({
            url: '/be-cp/header-classes',
            method: 'POST',
            data: {
              nid: nid,
              status: 'opportunity',
            },
            success: function(result){
              console.log(result);
              $('#hp_plan_specification').removeClass('be-blue be-gray be-green');
              $('#hp_rfp').removeClass('be-blue be-gray be-green');
              $('#hp_plan_specification').addClass(result['hp_plan_specification']);
              $('#hp_rfp').addClass(result['hp_rfp']);

              $('#hp_plan_presentation').removeClass('be-blue be-gray be-green');
              $('#hp_convert_to_deal').removeClass('be-blue be-gray be-green');
              $('#hp_plan_presentation').addClass(result['hp_plan_presentation']);
              $('#hp_convert_to_deal').addClass(result['hp_convert_to_deal']);
            },
          });
        }

        refreshHeaderClasses(nid);

        // for checking other major medical checkboxes.
        $('input[id*="edit-major-medical"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-major-medical"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-major-medical"].form-checkbox').prop('checked', false);
            }
          });
        });

        // for checking other limited medical checkboxes.
        $('input[id*="edit-limited-medical"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-limited-medical"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-limited-medical"].form-checkbox').prop('checked', false);
            }
          });
        });

        // for checking other teledoc checkboxes.
        $('input[id*="edit-teledoc"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-teledoc"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-teledoc"].form-checkbox').prop('checked', false);
            }
          });
        });

        // for checking other mec checkboxes.
        $('input[id*="edit-mec"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-mec"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-mec"].form-checkbox').prop('checked', false);
            }
          });
        });
        
        // for checking other life checkboxes.
        $('input[id*="edit-life"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-life"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-life"].form-checkbox').prop('checked', false);
            }
          });
        });
        
        // for checking other short term dissability checkboxes.
        $('input[id*="edit-short-term-disability"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-short-term-disability"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-short-term-disability"].form-checkbox').prop('checked', false);
            }
          });
        });
        
        // for checking other dental checkboxes.
        $('input[id*="edit-dental"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-dental"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-dental"].form-checkbox').prop('checked', false);
            }
          });
        });

        // for checking other vision checkboxes.
        $('input[id*="edit-vision"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-vision"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-vision"].form-checkbox').prop('checked', false);
            }
          });
        });
        
        // for checking other retirement checkboxes.
        $('input[id*="edit-retirement"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-retirement"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-retirement"].form-checkbox').prop('checked', false);
            }
          });
        });
        
        // for checking other special benefits checkboxes.
        $('input[id*="edit-special-benefits"].form-checkbox').each(function() {
          $(this).change(function() {
            if ($(this).is(":checked")) {
              $('input[id*="edit-special-benefits"].form-checkbox').prop('checked', true);
            }
            else {
              $('input[id*="edit-special-benefits"].form-checkbox').prop('checked', false);
            }
          });
        });

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

        // Check page if it is from creating RFP then open receive quote modal.
        var from_rfp = getUrlParameter('from_rfp');
        if (from_rfp) {
          if ($('#div-receive-quote').is('.current-step')) {
            $('#receive-quote').modal('show');
          }
        }

        // Check page if it is from sending link then open request specs modal.
        var link_sent = getUrlParameter('link_sent');
        if (link_sent) {
          if ($('#div-request-specs').is('.current-step')) {
            $('#request-specification').modal('show');
          }
        }

        // Check page if it is from sending link then open request specs modal.
        var proposal_sent = getUrlParameter('proposal_sent');
        if (proposal_sent) {
          if ($('#div-send-proposal').is('.current-step')) {
            $('#send-plan-proposal').modal('show');
          }
        }

        // Copy filename of attached proposal file to email form.
        $('input#edit-attach-proposal-upload').change(function() {
          $('.show-attachment a').html($(this).val().replace(/.*[\/\\]/, ''));
        });

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

        function checkboxValue(id) {
          if ($('#' + id).is(":checked")) {
            return 1;
          }
          else {
            return 0;
          }
        }

        $('#btn-save-exit-receive-details').click(function() {
          var plan_specs_nid = $('.current-progress-main').attr('plan-specs-nid');
          $.ajax({
            url: '/be-cp/save-planspecs',
            method: 'POST',
            data: {
              from_button: 'save_and_exit',
              nid: nid,
              plan_specs_nid: plan_specs_nid,
              company_name: $('.accnt-name-placeholder').val(),
              fringe_rates: $('#edit-fringe-rates').val(),
              proposed_effective_date: $('#edit-proposed-effective-date-datepicker-popup-0').val(),
              other_work_locations: $('#edit-other-work-locations').val(),
              number_of_employees: $('#edit-number-of-employees').val(),
              number_of_dependents: $('#edit-number-of-dependents').val(),
              nature_of_business: $('#edit-nature-of-business').val(),
              years_in_business: $('#edit-years-in-business').val(),
              tax_id: $('#edit-tax-id').val(),
              renewal_date: $('#edit-renewal-date-datepicker-popup-0').val(),
              major_medical: checkboxValue('edit-major-medical'),
              limited_medical: checkboxValue('edit-limited-medical'),
              teledoc: checkboxValue('edit-teledoc'),
              mec: checkboxValue('edit-mec'),
              life: checkboxValue('edit-life'),
              short_term_disability: checkboxValue('edit-short-term-disability'),
              dental: checkboxValue('edit-dental'),
              vision: checkboxValue('edit-vision'),
              retirement: checkboxValue('edit-retirement'),
              special_benefits: checkboxValue('edit-special-benefits'),
              special_benefits_text: $('#edit-special-benefits-text').val(),
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
              refreshHeaderClasses(nid);
              $('.current-progress-main').attr('plan-specs-nid', result);
            },
          });
        });

        $('#btn-next-generate-rfp').click(function() {
          var plan_specs_nid = $('.current-progress-main').attr('plan-specs-nid');
          $.ajax({
            url: '/be-cp/save-planspecs',
            method: 'POST',
            data: {
              from_button: 'next_generate_rfp',
              nid: nid,
              plan_specs_nid: plan_specs_nid,
              company_name: $('.accnt-name-placeholder').val(),
              fringe_rates: $('#edit-fringe-rates').val(),
              proposed_effective_date: $('#edit-proposed-effective-date-datepicker-popup-0').val(),
              other_work_locations: $('#edit-other-work-locations').val(),
              number_of_employees: $('#edit-number-of-employees').val(),
              number_of_dependents: $('#edit-number-of-dependents').val(),
              nature_of_business: $('#edit-nature-of-business').val(),
              years_in_business: $('#edit-years-in-business').val(),
              tax_id: $('#edit-tax-id').val(),
              renewal_date: $('#edit-renewal-date-datepicker-popup-0').val(),
              major_medical: checkboxValue('edit-major-medical'),
              limited_medical: checkboxValue('edit-limited-medical'),
              teledoc: checkboxValue('edit-teledoc'),
              mec: checkboxValue('edit-mec'),
              life: checkboxValue('edit-life'),
              short_term_disability: checkboxValue('edit-short-term-disability'),
              dental: checkboxValue('edit-dental'),
              vision: checkboxValue('edit-vision'),
              retirement: checkboxValue('edit-retirement'),
              special_benefits: checkboxValue('edit-special-benefits'),
              special_benefits_text: $('#edit-special-benefits-text').val(),
            },
            success: function(result){
              console.log(result);
              $('.current-progress-main').attr('plan-specs-nid', result);
              refreshClasses(nid);
              refreshHeaderClasses(nid);
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
              refreshHeaderClasses(nid);
            },
          });
        });

        $('#btn-receive-feedback-opportunity').click(function() {
          $.ajax({
            url: '/be-cp/receive-feedback-op',
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

        $('#btn-save-exit-receive-feedback').click(function() {
          var account_estimate_value = $('#edit-account-estimate-value').val();
          $.ajax({
            url: '/be-cp/save-exit-rf-op',
            method: 'POST',
            data: {
              nid: nid,
              account_estimate_value: account_estimate_value,
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
              refreshHeaderClasses(nid);
            },
          });
        });

        $('#btn-accept-proposal-yes').click(function() {
          var account_estimate_value = $('#edit-account-estimate-value').val();
          $.ajax({
            url: '/be-cp/accept-proposal-yes',
            method: 'POST',
            data: {
              nid: nid,
              account_estimate_value: account_estimate_value,
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