/**
 * @file
 * A JavaScript file for bullseye_star module.
 */

(function ($, Drupal, window, document) {

  'use strict';

  // To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.bullseye_star = {
    attach: function (context, settings) {

      $(document).ready(function() {
        
        // For starring a contact in accounts, leads and prospects.
        if ($('i.starred').length) {

          var starred_contacts = [];

          $.ajax({
            url: '/get-starred-contacts',
            method: 'POST',
            data: {},
            success: function(result){
              console.log(result);
              starred_contacts = result;
              $.each(result, function(i, item) {
                if ($('i.fa-star[data-contact-id="' + item + '"]').length) {
                  $('i.fa-star[data-contact-id="' + item + '"]').parent().find('i.fa-spin').hide();
                  $('i.fa-star[data-contact-id="' + item + '"]').addClass('yellow');
                  $('i.fa-star[data-contact-id="' + item + '"]').addClass('star-processed');
                  $('i.fa-star[data-contact-id="' + item + '"]').show();
                }
              });
              $('i.fa-star:not(.star-processed)').each(function() {
                $(this).parent().find('i.fa-spin').hide();
                $(this).removeClass('yellow');
                $(this).show();
              });
            },
          }).fail(function(jqXHR, textStatus) {
            console.log('fail');
          });

          $('i.starred').each(function() {

            $(this).click(function() {
              var current_i = $(this);
              var contact_id = $(this).attr('data-contact-id');
              var star = 'yes';
              if ($(this).is('.yellow')) {
                star = 'no';
              }
              $.ajax({
                url: '/star-contacts',
                method: 'POST',
                data: {
                  contact_id: contact_id,
                  star: star,
                },
                success: function(result){
                  console.log(result);
                  current_i.toggleClass('yellow');
                },
              }).fail(function(jqXHR, textStatus) {
                console.log('fail');
              });
            });
          });
    
        }

        // For refreshing the contents of starred contacts block.
        function refreshStarredContacts(offset) {
          $('#dashboard-starred-contacts').load('/be-star/starred-contacts', {offset: offset}, function() {
          });
        }

        if ($('#dashboard-starred-contacts').length) {
          refreshStarredContacts(0);
        }

        // Starred Contacts pagination - previous button.
        $('#starred-prev').click(function(e) {
          var offset = $('#starred-contacts-data-offset').val();
          if (parseInt(offset) > 0) {
            var new_offset = parseInt(offset) - 10;
            $('#starred-contacts-data-offset').val(new_offset);
            refreshStarredContacts(new_offset);
          }
          e.preventDefault();
        });

        // Starred Contacts pagination - previous button.
        $('#starred-next').click(function(e) {
          var offset = $('#starred-contacts-data-offset').val();
          if ($('#dashboard-starred-contacts tr').length == 10) {
            var new_offset = parseInt(offset) + 10;
            $('#starred-contacts-data-offset').val(new_offset);
            refreshStarredContacts(new_offset);
          }
          e.preventDefault();
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);