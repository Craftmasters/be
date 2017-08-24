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

      // For sidebar.
      $('.left-sidebar').css('min-height', $(document).height() + 'px');

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
            $('.plan-specification input').prop('disabled', true);
            $('.benefits input').prop('disabled', true);
            $('.attachments input').prop('disabled', true);
            $('.census input').prop('disabled', true);
            $('.accordion-benefits').hide();
            $('.benefits-summary').show();
            $('.benefits-summary').html('');
            $('.attachment-main').hide();
            $('.attachment-summary').show();
            $('.attachment-summary').html('');

            $('.accordion_in').each(function() {

              // Benefit Name.
              var benefit_name = $(this).find('.acc_head').html();
              var benefit_name = '<h1 class="benefit-name">' + benefit_name + '</h1>';

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

              var div = '<div class="benefit-summary-row">' + benefit_name + carrier + quote + renewal + waiting + '</div>';
              $('.benefits-summary').append(div);
            });

            $('.attachment-row').each(function() {
              var attach_label = $(this).find('label').html();
              var attach_label = '<span class="attach-label">' + attach_label + '</span>';

              var attach_file = $(this).find('input[type="file"]').val();
              var attach_file = attach_file.replace(/.*[\/\\]/, '');
              if (attach_file == '') {
                attach_file = 'No Attachment';
              }
              var attach_file = '<span class="attach-file">' + attach_file + '</span>';

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
            $('.plan-specification input').prop('disabled', false);
            $('.benefits input').prop('disabled', false);
            $('.attachments input').prop('disabled', false);
            $('.census input').prop('disabled', false);
            $('.accordion-benefits').show();
            $('.benefits-summary').hide();
            $('.attachment-main').show();
            $('.attachment-summary').hide();
          });

          $('.save-exit').click(function() {
            $('button#edit-submit').click();
          });
        }

        // For Calendar page (Activities).
        if ($('.page-calendar').length) {
          $('.fc-day-number').each(function() {
            var number = $(this).html();
            $(this).html('<span>' + number + '</span>');
          });
        }

      });

        
    }
  };

})(jQuery, Drupal, this, this.document);