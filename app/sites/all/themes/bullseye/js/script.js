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

        $(".accordion-benefits").smk_Accordion({
          showIcon: true, // Show the expand/collapse icons.
          animation: true, // Expand/collapse sections with slide aniamtion.
          closeAble: false, // Closeable section.
          slideSpeed: 200 // the speed of slide animation.
        });

      });

        
    }
  };

})(jQuery, Drupal, this, this.document);