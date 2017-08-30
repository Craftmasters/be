/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document) {

  'use strict';

  // To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.bullseye = {
    attach: function (context, settings) {

      // For top header.
      if ($('.top-header-li').length) {
        $('.top-header-li').each(function() {
          $(this).click(function() {
            $(this).find('ul.top-header-ul-children').toggleClass('hide');
          });
        });
      }

      // For superfish sidebarmenu.
      if ($('#block-superfish-1').length) {
        $('#superfish-1-accordion').removeClass('sf-hidden');
        $('#superfish-1-accordion').show();
        $('#superfish-1-toggle').hide();
        $('#superfish-1-toggle, #superfish-1-accordion').addClass('sf-expanded');

        $('a.menuparent').each(function() {
          var href = $(this).attr('href');
          var text = $(this).text();
          var link = '<a class="main-link" href="' + href + '">' + text + '</a>';
          $(this).parent().prepend(link);
          $(this).append('<i class="fa fa-sort-desc" aria-hidden="true"></i>');
          $(this).click(function() {
            $(this).find('i').toggleClass('fa-sort-asc');
          });
        });

        $('.block-superfish li.active-trail').each(function() {
          $(this).addClass('sf-expanded');          
        });

      }

      // For tabs.
      $(".tab-navigations .tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
      });

      // For lightbox iframes.
      $(document).ready(function() {

        // Adding class to body element of the lightbox iframe
        var parent_iframe = $(window.frameElement).parent().find('iframe#lightboxFrame');
        parent_iframe.contents().find('body').addClass('be-lightbox');
        parent_iframe.contents().find('html').addClass('be-lightbox-html');
        $(window.frameElement).parent().find('iframe#lightboxFrame').css('visibility', 'visible');

        // For Create RFP page.
        if ($('.page-rfps-add').length) {

          // Benefits Accordion.
          $(".accordion-benefits").smk_Accordion({
            showIcon: true, // Show the expand/collapse icons.
            animation: true, // Expand/collapse sections with slide aniamtion.
            closeAble: false, // Closeable section.
            slideSpeed: 200 // the speed of slide animation.
          });

          $('.rfp-next-summary').click(function() {
            $(this).hide();
            $('.be-page-title').hide();
            $('.create-rfp-back').show();
            $('.save-exit').show();
            $('.be-summary-title').show();
            $('.group-information').addClass('summary-mode');
            $('.plan-specification').addClass('summary-mode');
            $('.benefits').addClass('summary-mode');
            $('.attachments').addClass('summary-mode');
            $('.census').addClass('summary-mode');
            $('.plan-specification input').attr('readonly', true);
            $('.benefits input').attr('readonly', true);
            $('.attachments input').attr('readonly', true);
            $('.census input').attr('readonly', true);
            $('.summary-cover').show();
            $('.accordion-benefits').hide();
            $('.benefits-summary').show();
            $('.benefits-summary').html('');
            $('.attachment-main').hide();
            $('.attachment-summary').show();
            $('.attachment-summary').html('');

            // Build the summary block for Benefits block.
            $('.accordion_in').each(function() {

              // Benefit Name.
              var benefit_name = $(this).find('.acc_head').html();
              var benefit_name = '<h1 class="benefit-name">' + benefit_name + '</h1>';
              var main_benefit = $(this).attr('data-benefit');

              // Generate RFP button.
              var generate_rfp = '<a href="#" data-toggle="modal" main-benefit="' + main_benefit + '" data-target="#modal_' + main_benefit + '" class="btn-generate-rfp" id="generate_' + main_benefit + '">Generate RFP</a>';

              // Carrier.
              var current_carrier = $(this).find('.current-carrier').find('input[type="text"]').val();
              var current_carrier_year = $(this).find('.years-with-current-carrier').find('input[type="text"]').val();
              var carrier = current_carrier + ', ' + current_carrier_year;
              var carrier = '<span class="label">Current Carrier:</span><span class="value">' + carrier + '</span>';
              var carrier = '<div class="ben-detail-row">' + carrier + '</div>';

              // Plan Year to quote.
              var quote_start = $(this).find('.quote-start').find('input[type="text"]').val();
              var quote_end = $(this).find('.quote-end').find('input[type="text"]').val();
              var quote = quote_start + ' - ' + quote_end;
              var quote = '<span class="label">Plan Year to Quote:</span><span class="value">' + quote + '</span>';
              var quote = '<div class="ben-detail-row">' + quote + '</div>';

              // Renewal.
              var renewal = $(this).find('.renewal-plan').find('input:checked').val();
              var renewal_value = 'No';
              if (renewal == 1) {
                renewal_value = 'Yes';
              }
              var renewal = '<span class="label">Renewal:</span><span class="value">' + renewal_value + '</span>';
              var renewal = '<div class="ben-detail-row">' + renewal + '</div>';

              // Waiting Period.
              var waiting = $(this).find('.waiting-period').find('input[type="text"]').val();
              var waiting = '<span class="label">Waiting Period:</span><span class="value">' + waiting + '</span>';
              var waiting = '<div class="ben-detail-row">' + waiting + '</div>';

              var div = '<div class="benefit-summary-row">' + benefit_name + generate_rfp + carrier + quote + renewal + waiting + '</div>';
              $('.benefits-summary').append(div);

              // Putting values to pdf preview.
              $('#generate_' + main_benefit).click(function() {
                var main_benefit = $(this).attr('main-benefit');
                var company_name = $('#gi-company-name').text();
                var company_email = $('#gi-email').text();
                var company_phone = $('#gi-phone').text();
                var company_address = $('#gi-address').text() + ', ' + $('#gi-city').text() + ', ' + $('#gi-state').text() + ' ' + $('#gi-zip-code').text();
                var fringe_rates = $('#edit-fringe-rates').val();
                var effective_date = $('#edit-proposed-effective-date-datepicker-popup-0').val();
                var location = $('#edit-other-work-locations').val();
                var employees = $('#edit-number-of-employees').val();
                var dependents = $('#edit-number-of-dependents').val();
                var business = $('#edit-nature-of-business').val();
                var years_business = $('#edit-years-in-business').val();
                var tax_id = $('#edit-tax-id').val();
                var renewal_date = $('#edit-renewal-date-datepicker-popup-0').val();
                var current_carrier = $('.acc_' + main_benefit + ' .current-carrier input').val();
                var current_carrier_years = $('.acc_' + main_benefit + ' .years-with-current-carrier input').val();
                var plan_year_quote_start = $('.acc_' + main_benefit + ' .quote-start input').val();
                var plan_year_quote_end = $('.acc_' + main_benefit + ' .quote-end input').val();
                var renewal = $('.acc_' + main_benefit + ' .renewal-plan input:checked').val();
                var waiting_period = $('.acc_' + main_benefit + ' .waiting-period input').val();

                if (renewal == 1) {
                  renewal = 'Yes';
                }
                else {
                  renewal = 'No';
                }

                $('.pdf-company-name').html(company_name);
                $('.pdf-email').html(company_email);
                $('.pdf-phone').html(company_phone);
                $('.pdf-address').html(company_address);
                $('.pdf-fringe-rates').html(fringe_rates);
                $('.pdf-effective-date').html(effective_date);
                $('.pdf-location').html(location);
                $('.pdf-employees').html(employees);
                $('.pdf-dependents').html(dependents);
                $('.pdf-business').html(business);
                $('.pdf-years-business').html(years_business);
                $('.pdf-tax-id').html(tax_id);
                $('.pdf-renewal-date').html(renewal_date);

                $('#modal_' + main_benefit + ' .pdf-current-carrier').html(current_carrier + ', ' + current_carrier_years);
                $('#modal_' + main_benefit + ' .pdf-plan-year-quote').html(plan_year_quote_start + ' - ' + plan_year_quote_end);
                $('#modal_' + main_benefit + ' .pdf-renewal').html(renewal);
                $('#modal_' + main_benefit + ' .pdf-waiting-period').html(waiting_period);

              });

            });

            // Build the summary block for Attachments block.
            $('.attachment-row').each(function() {
              var attach_label = $(this).find('label').html();
              var attach_class = $(this).find('label').attr('for');
              var attach_label = '<span class="attach-label">' + attach_label + '</span>';

              var attach_file = $(this).find('input[type="file"]').val();
              var attach_file = attach_file.replace(/.*[\/\\]/, '');
              if (attach_file == '') {
                attach_file = 'No Attachment';
              }
              var attach_file = '<span class="attach-file ' + attach_class + '">' + attach_file + '</span>';

              var attach_div = '<div class="attachment-summary-row">' + attach_label + attach_file + '</div>';
              $('.attachment-summary').append(attach_div);
            });

          });

          $('.create-rfp-back').click(function() {
            $(this).hide();
            $('.be-summary-title').hide();
            $('.save-exit').hide();
            $('.be-page-title').show();
            $('.rfp-next-summary').show();
            $('.group-information').removeClass('summary-mode');
            $('.plan-specification').removeClass('summary-mode');
            $('.benefits').removeClass('summary-mode');
            $('.attachments').removeClass('summary-mode');
            $('.census').removeClass('summary-mode');
            $('.plan-specification input').attr('readonly', false);
            $('.benefits input').attr('readonly', false);
            $('.attachments input').attr('readonly', false);
            $('.census input').attr('readonly', false);
            $('.summary-cover').hide();
            $('.accordion-benefits').show();
            $('.benefits-summary').hide();
            $('.attachment-main').show();
            $('.attachment-summary').hide();
          });

          $('.save-exit').click(function() {
            $('button#edit-submit').click();
          });

          // For attachments.
          $('.next-send-email').click(function() {
            $('.include-attachments .form-type-checkbox').css('display', 'none');
            if ($('span.edit-employee-census-upload').html() != 'No Attachment') {
              $('div[class*="attach-ec"]').css('display', 'block');
            }
            if ($('span.edit-current-summary-of-benefit-upload').html() != 'No Attachment') {
              $('div[class*="attach-csob"]').css('display', 'block');
            }
            if ($('span.edit-current-bill-upload').html() != 'No Attachment') {
              $('div[class*="attach-cb"]').css('display', 'block');
            }
            if ($('span.edit-last-renewal-letter-upload').html() != 'No Attachment') {
              $('div[class*="attach-lrlr"]').css('display', 'block');
            }
            if ($('span.edit-summary-of-monthly-claims-experience-upload').html() != 'No Attachment') {
              $('div[class*="attach-somce"]').css('display', 'block');
            }
            if ($('span.edit-broker-of-record-upload').html() != 'No Attachment') {
              $('div[class*="attach-bor"]').css('display', 'block');
            }
            if ($('span.edit-letter-of-authorization-upload').html() != 'No Attachment') {
              $('div[class*="attach-loa"]').css('display', 'block');
            }
            if ($('span.edit-large-claims-report-upload').html() != 'No Attachment') {
              $('div[class*="attach-lcr"]').css('display', 'block');
            }
          });

        }

        // For Calendar page (Activities).
        if ($('.page-calendar').length) {
          $('.fc-day-number').each(function() {
            var number = $(this).html();
            $(this).html('<span>' + number + '</span>');
          });
        }

        // For Current Progress Leads.
        if ($('#bullseye-current-progress-leads-form').length) {
          $(window).keydown(function(event){
            
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });

          $('#btn-verify-yes-sca').click(function() {
            $('#edit-work-sca-dbra-yes-sca').prop('checked', true);
          });

          $('#btn-verify-yes-dbra').click(function() {
            $('#edit-work-sca-dbra-yes-dbra').prop('checked', true);
          });

          $('#btn-verify-yes-both').click(function() {
            $('#edit-work-sca-dbra-yes-both').prop('checked', true);
          });

          $('#btn-verify-no').click(function() {
            $('#edit-work-sca-dbra-no').prop('checked', true);
          });

          $('#btn-plan-sca-dbra-yes').click(function() {
            $('#edit-plan-to-work-sca-dbra-yes').prop('checked', true);
          });

          $('#btn-plan-sca-dbra-no').click(function() {
            $('#edit-plan-to-work-sca-dbra-no').prop('checked', true);
          });
        }

      });

      $(window).load(function() {
        // For sidebar.
        $('.left-sidebar').css('min-height', $(document).height() + 'px');
      });

        
    }
  };

})(jQuery, Drupal, this, this.document);