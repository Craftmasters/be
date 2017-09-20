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
  Drupal.behaviors.pending_producer = {
    attach: function (context, settings) {

      // Approve pending producer.
      $('.approve').click(function() {
        console.log(this)
        var producer_uid = $(this).data('uid');
        console.log(producer_uid);
        $.ajax({
          url: '/producer/approve-pending-producer',
          method: 'POST',
          data: {
            producer_uid: producer_uid,
          },
          success: function(result){
            console.log(result);
          },
        }).fail(function(jqXHR, textStatus) {
          console.log('Cannot processed producer account.');
        });
      });

      // Delete pending producer.
      $('.approve').click(function() {
        console.log(this)
        var producer_uid = $(this).data('uid');
        console.log(producer_uid);
        $.ajax({
          url: '/producer/approve-pending-producer',
          method: 'POST',
          data: {
            producer_uid: producer_uid,
          },
          success: function(result){
            console.log(result);
          },
        }).fail(function(jqXHR, textStatus) {
          console.log('Cannot processed producer account.');
        });
      });
    }
  };
})(jQuery, Drupal, this, this.document);
