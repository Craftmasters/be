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
        });

      }
    }
  };

})(jQuery, Drupal, this, this.document);