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

        // For dashboard statistics animation.
        if ($('.statistics-dashboard').length) {
          var lead_num = $('#stat-lead-num').attr('data-number');
          var prospect_num = $('#stat-prospect-num').attr('data-number');
          var opportunity_num = $('#stat-opportunity-num').attr('data-number');
          var deal_num = $('#stat-deal-num').attr('data-number');
          var closed_num = $('#stat-closed-num').attr('data-number');

          lead_num = new CountUp('stat-lead-num', 0, lead_num);
          prospect_num = new CountUp('stat-prospect-num', 0, prospect_num);
          opportunity_num = new CountUp('stat-opportunity-num', 0, opportunity_num);
          deal_num = new CountUp('stat-deal-num', 0, deal_num);
          closed_num = new CountUp('stat-closed-num', 0, closed_num);

          lead_num.start();
          prospect_num.start();
          opportunity_num.start();
          deal_num.start();
          closed_num.start();
        }

        // Adding class to body element of the lightbox iframe
        var parent_iframe = $(window.frameElement).parent().find('iframe#lightboxFrame');
        parent_iframe.contents().find('body').addClass('be-lightbox');
        parent_iframe.contents().find('html').addClass('be-lightbox-html');
        $(window.frameElement).parent().find('iframe#lightboxFrame').css('visibility', 'visible');

        if ($('#be-lightbox-close').length) {
          $('#be-lightbox-close').click(function () {
            parent.Lightbox.end();
          });
        }

        // For adding new account modal.
        if ($('#add-new-account').length) {
          $('#company-exists-no').click(function() {
            $('#add-new-account').modal('hide');
          });
          $('#company-exists-yes').click(function() {
            $('#add-new-account').modal('hide');
          });
        }



        // For Create RFP page.
        if ($('.page-rfps-add').length) {

          function refreshAttachmentSummary() {
            // Build the summary block for Attachments block.
            $('.attachment-summary').html('');
            $('.attachment-row').each(function() {
              var attach_label = $(this).find('label').html();
              var attach_class = $(this).find('label').attr('for');
              var attach_label = '<span class="attach-label">' + attach_label + '</span>';

              if ($(this).find('input[type="file"]').length) {
                var attach_file = $(this).find('input[type="file"]').val();
                attach_file = attach_file.replace(/.*[\/\\]/, '');
              }
              else {
                var attach_file = $(this).find('span.file').find('a').text();
              }

              if (attach_file == '') {
                attach_file = 'No Attachment';
              }
              var attach_file = '<span class="attach-file ' + attach_class + '">' + attach_file + '</span>';

              var attach_div = '<div class="attachment-summary-row">' + attach_label + attach_file + '</div>';
              $('.attachment-summary').append(attach_div);
            });
          }

          refreshAttachmentSummary();

          $('em.placeholder').each(function() {
            if ($(this).text() == 'FontLib\\AdobeFontMetrics->write()') {
              if ($(this).closest('ul').length) {
                $(this).closest('li').remove();
              }
              else {
                $(this).closest('.alert').remove();
              }
            }
            if ($(this).text() == 'FontLib\\AdobeFontMetrics->addLine()') {
              if ($(this).closest('ul').length) {
                $(this).closest('li').remove();
              }
              else {
                $(this).closest('.alert').remove();
              }
            }
          });

          $('.alert.alert-block.error').each(function() {
            if ($(this).find('li').length == 0) {
              $(this).remove();
            }
          });
          $('.alert.alert-block.error').show();

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
            $('.rfp-benefits-error-container').hide();

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

              // Carriers to send RFP.
              var carriers_input = '';
              $(this).find('input[type="text"][id*="-carrier-to-send-"]').each(function() {
                var text = $(this).val();
                var carrier_trimmed = text.replace(/\s+\(.+?\)/g, '');
                var number = $(this).attr('id');
                var number = number[number.length -1];
                var car_email = $(this).closest('.carriers-to-send').find('input.carrier-email-' + number).val();
                if (car_email != '') {
                  carriers_input = carriers_input + '<span>' + carrier_trimmed + ', ' + car_email + '</span>';
                }

              });
              var carriers_send = '<span class="label">Carriers to send RFP:</span><span class="value">' + carriers_input + '</span>';
              var carriers_send = '<div class="ben-detail-row">' + carriers_send + '</div>';

              // Waiting Period.
              var waiting = $(this).find('.waiting-period').find('input[type="text"]').val();
              var waiting = '<span class="label">Waiting Period:</span><span class="value">' + waiting + '</span>';
              var waiting = '<div class="ben-detail-row">' + waiting + '</div>';

              var div = '<div class="benefit-summary-row">' + benefit_name + generate_rfp + carrier + quote + renewal + carriers_send + waiting + '</div>';
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

            refreshAttachmentSummary();

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

            var count = 0;

            $('.include-attachments .form-type-checkbox').css('display', 'none');
            if ($('span.edit-employee-census-upload').html() != 'No Attachment') {
              $('div[class*="attach-ec"]').css('display', 'block');
              count++;
            }
            if ($('span.edit-current-summary-of-benefit-upload').html() != 'No Attachment') {
              $('div[class*="attach-csob"]').css('display', 'block');
              count++;
            }
            if ($('span.edit-current-bill-upload').html() != 'No Attachment') {
              $('div[class*="attach-cb"]').css('display', 'block');
              count++;
            }
            if ($('span.edit-last-renewal-letter-upload').html() != 'No Attachment') {
              $('div[class*="attach-lrlr"]').css('display', 'block');
              count++;
            }
            if ($('span.edit-summary-of-monthly-claims-experience-upload').html() != 'No Attachment') {
              $('div[class*="attach-somce"]').css('display', 'block');
              count++;
            }
            if ($('span.edit-broker-of-record-upload').html() != 'No Attachment') {
              $('div[class*="attach-bor"]').css('display', 'block');
              count++;
            }
            if ($('span.edit-letter-of-authorization-upload').html() != 'No Attachment') {
              $('div[class*="attach-loa"]').css('display', 'block');
              count++;
            }
            if ($('span.edit-large-claims-report-upload').html() != 'No Attachment') {
              $('div[class*="attach-lcr"]').css('display', 'block');
              count++;
            }

            if (count == 0) {
              $('.rfp-benefits-error-container').show();
            }

          });

          // For carriers to send email.
          $('div[class*="-carrier-to-send-"] input[type="text"]').each(function() {

            $(this, context).bind('autocompleteSelect', function() {
              var current_element = $(this);
              var carrier = $(this).val();
              var number = $(this).attr('id');
              var number = number[number.length -1];
              var s = carrier.replace(/\(/g, '.');
              s = s.replace(/\)/g, '');
              var numbersArray = s.split('.');
              var carrier_nid = '';
              var email_input = current_element.closest('.carriers-to-send').find('input.carrier-email-' + number);
              $.each(numbersArray, function(i, item) {
                carrier_nid = item;
              });
              $.ajax({
                url: '/get-carrier-email',
                method: 'POST',
                data: {
                  carrier_nid: carrier_nid,
                },
                success: function(result){
                  console.log(result);
                  email_input.attr('value', result);
                  email_input.val(result).change();
                  email_input.prop('readonly', true);
                },
              }).fail(function(jqXHR, textStatus) {
                email_input.val('No email address').change();
              });
            });

            if ($(this).val() != '') {

              var current_element = $(this);
              var number = $(this).attr('id');
              var number = number[number.length -1];
              var carrier = $(this).val();
              var s = carrier.replace(/\(/g, '.');
              s = s.replace(/\)/g, '');
              var numbersArray = s.split('.');
              var carrier_nid = '';
              var email_input = current_element.closest('.carriers-to-send').find('input.carrier-email-' + number);
              $.each(numbersArray, function(i, item) {
                carrier_nid = item;
              });
              $.ajax({
                url: '/get-carrier-email',
                method: 'POST',
                data: {
                  carrier_nid: carrier_nid,
                },
                success: function(result){
                  console.log(result);
                  email_input.attr('value', result);email_input.attr('value', result);
                  email_input.attr('value', result);
                  email_input.val(result).change();
                  email_input.prop('readonly', true);
                  current_element.closest('div[class*="-carrier-to-send-"]').show();
                  email_input.show();
                },
              }).fail(function(jqXHR, textStatus) {
                email_input.val('No email address').change();
              });
            }
          });

          // for adding another carriers to send email.
          $('.add-carriers-to-send-link').each(function() {
            $(this).click(function(e) {
              var b_section = $(this).closest('.accordion_in').attr('data-benefit');
              var c_count = 0;
              $('div[data-benefit="' + b_section + '"] div[class*="-carrier-to-send-"] input[type="text"]').each(function () {
                var number = $(this).attr('id');
                var number = number[number.length -1];
                if (!$(this).closest('.form-type-entityreference').is(':visible')) {
                  if (c_count == 0) {
                    $(this).closest('.form-type-entityreference').show();
                    $(this).closest('.carriers-to-send').find('input.carrier-email-' + number).show();
                    c_count = 1;
                  }
                }
              });
              c_count = 0;
              if ($(this).closest('.carriers-to-send').find('input.carrier-email-5').is(':visible')) {
                $(this).hide();
              }
              e.preventDefault();
            });
          });
        }

        // For Calendar page (Activities).
        if ($('.page-calendar').length) {
          $('.fc-day-number').each(function() {
            var number = $(this).html();
            $(this).html('<span>' + number + '</span>');
          });
        }

        // For current progress pages.
        if ($('#block-bullseye-blocks-be-current-progress').length) {
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

          $('em.placeholder').each(function() {
            if ($(this).text() == 'taxonomy_field_widget_form()') {
              $(this).closest('.alert').remove();
            }
          });
        }

        // For edit account details modal.
        if ($('.page-edit-account-details').length) {
          $('em.placeholder').each(function() {
            if ($(this).text() == 'taxonomy_field_widget_form()') {
              if ($(this).closest('ul').length) {
                $(this).closest('li').remove();
              }
              else {
                $(this).closest('.alert').remove();
              }
            }
          });
          $('.alert').show();
        }

        // For dashboard revenue chart.
        if ($("#dashboard-revenue").length) {
          var dashboard_revenue = $("#dashboard-revenue");
          var data = {
            labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
            datasets: [{
              label: 'Closed Deals',
              backgroundColor: '#f58a3e',
              data: [
                settings.revenue_cds.jan,
                settings.revenue_cds.feb,
                settings.revenue_cds.mar,
                settings.revenue_cds.apr,
                settings.revenue_cds.may,
                settings.revenue_cds.jun,
                settings.revenue_cds.july,
                settings.revenue_cds.aug,
                settings.revenue_cds.sept,
                settings.revenue_cds.oct,
                settings.revenue_cds.nov,
                settings.revenue_cds.dec
              ],
            }, {
              label: 'Deals in Progress',
              backgroundColor: '#ffbc34',
              data: [
                settings.revenue_dip.jan,
                settings.revenue_dip.feb,
                settings.revenue_dip.mar,
                settings.revenue_dip.apr,
                settings.revenue_dip.may,
                settings.revenue_dip.jun,
                settings.revenue_dip.july,
                settings.revenue_dip.aug,
                settings.revenue_dip.sept,
                settings.revenue_dip.oct,
                settings.revenue_dip.nov,
                settings.revenue_dip.dec
              ],
            }]
          };
          var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              display: false
            },
            scales: {
              xAxes: [{
                stacked: true,
                gridLines: {
                  display: false,
                },
                ticks: {
                  fontColor: '#92A6B9',
                  fontFamily: 'Proximanova-Bold',
                  fontSize: 12
                }
              }],
              yAxes: [{
                stacked: true,
                ticks: {
                  fontColor: '#92A6B9',
                  fontFamily: 'Proximanova-Bold',
                  fontSize: 14,
                  min: 0,
                  max: 50000,
                  fixedStepSize: 25000,
                  callback: function(value, index, values) {
                    var value_comma = value.toLocaleString();
                    return '$' + value_comma;
                  }
                },
              }]
            },
          };
          var dashboard_revenue_chart = new Chart(dashboard_revenue, {
            type: 'bar',
            data: data,
            options: options
          });
        }

        // For dashboard performance chart.
        if ($('#performance-chart').length) {
          var performance_chart = new d3pie('performance-chart', {
            header: {
              title: {
                text: 'WIN RATIO',
                color: '#92a5b9',
                fontSize: 16,
                font: 'Proximanova-Semibold'
              },
              subtitle: {
                text: settings.dashboard.win_ratio + '%',
                color: '#6c6c6c',
                fontSize: 40,
                font: 'Proximanova-Light'
              },
              location: 'pie-center',
              titleSubtitlePadding: 0
            },
            size: {
              canvasHeight: 180,
              canvasWidth: 180,
              pieInnerRadius: '84%',
              pieOuterRadius: '100%'
            },
            data: {
              sortOrder: 'label-desc',
              content: [
                {
                  label: '',
                  value: 0,
                  color: '#F58A3E'
                },
                {
                  label: '',
                  value: 100,
                  color: '#87AEB6'
                }
              ]
            },
            labels: {
              outer: {
                format: 'none',
                pieDistance: 20
              },
              inner: {
                format: 'none'
              },
            },
            misc: {
              colors: {
                segmentStroke: 'transparent'
              },
              canvasPadding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
              }
            }
          });
        }

        // Datepicker for create event block.
        if ($('#create-event-date-activity').length) {
          $('#create-event-date-activity').datetimepicker();
        }
        if ($('#create-event-date-task').length) {
          $('#create-event-date-task').datetimepicker();
        }

        // For sending the suggestion form.
        if ($('#btn-submit-suggestion').length) {
          $('#btn-submit-suggestion').click(function() {
            $.ajax({
              url: '/suggestion-box',
              method: 'POST',
              data: {
                content_subject: $('#suggestion-subject').val(),
                name: $('#suggestion-name').val(),
                details: $('#suggestion-details').val(),
              },
              success: function(result){
                console.log(result);
                if (result == 'success') {
                  $('#suggestion-box-success').modal('show');
                }
              },
            });
          });
        }

        // For toggling the edit fields in contact modal.
        if ($('.edit-contact-toggle').length) {
          $('.edit-contact-toggle').click(function() {
            $('.be-custom-template-form').toggleClass('fields-disabled');
          });
        }

        // For be tables.
        if ($('.be-tables').length) {
          $('.be-tables').tableSearch({
            searchText:'Search',
            searchPlaceHolder:'Enter keyword here ..'
          });
          $('.be-tables').stickyTableHeaders({scrollableArea: $('.be-table-content')});
          $('.be-tables').tablesorter();
        }

        // For checkbox in listings.
        if ($('.be-table-checkbox').length) {
          $('.be-table-checkbox').each(function() {
            $(this).change(function() {
              var id = $(this).val();
              var contact_id = $(this).attr('data-contact-id');
              var assign_link = $('#producer-assign-link').attr('href');
              var delete_link = $('#delete-accounts-link').attr('href');
              var rfp_delete_link = $('#delete-rfps-link').attr('href');
              var proposal_delete_link = $('#delete-proposals-link').attr('href');
              var producer_delete_link = $('#delete-producers-link').attr('href');
              var carrier_delete_link = $('#delete-carriers-link').attr('href');
              if ($(this).is(':checked')) {
                assign_link = assign_link + id + ',';
                delete_link = delete_link + contact_id + ',';
                rfp_delete_link = rfp_delete_link + id + ',';
                proposal_delete_link = proposal_delete_link + id + ',';
                producer_delete_link = producer_delete_link + id + ',';
                carrier_delete_link = carrier_delete_link + id + ',';
              }
              $('#producer-assign-link').attr('href', assign_link);
              $('#delete-accounts-link').attr('href', delete_link);
              $('#delete-rfps-link').attr('href', rfp_delete_link);
              $('#delete-proposals-link').attr('href', proposal_delete_link);
              $('#delete-producers-link').attr('href', producer_delete_link);
              $('#delete-carriers-link').attr('href', carrier_delete_link);
            });
          });
        }

        // Load the producer pending count if admin.
        if ($('body.administrator').length || $('body.admin').length) {
          $.ajax({
            url: '/producer/get-pending-count',
            method: 'POST',
            data: {},
            success: function(result){
              $("a:contains('Producers').sf-depth-1").parent().prepend(result);
            },
          }).fail(function(jqXHR, textStatus) {

          });
        }

        // For add new leads form.
        if ($('.page-edit-contact-person').length) {
          $('em.placeholder').each(function() {
            if ($(this).text() == 'taxonomy_field_widget_form()') {
              $(this).closest('.alert').remove();
            }
          });
          $('.alert').show();
          if ($('.alert').length) {
            $('.be-custom-template-form').removeClass('fields-disabled');
          }
        }

      });

      $(window).load(function() {
        // For sidebar.
        $('.left-sidebar').css('min-height', $(document).height() + 'px');
      });


    }
  };

})(jQuery, Drupal, this, this.document);
