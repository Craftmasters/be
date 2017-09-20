/**
 * @file
 * A JavaScript file for bullseye_current_progress module.
 */

(function ($, Drupal, window, document) {

  'use strict';

  // To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.bullseye_event = {
    attach: function (context, settings) {

      $(document).ready(function() {
        var nid = $('.be-create-event').attr('node-id');

        function refreshRecentActivities(filter) {
          $('#recent-activities-container').load('/be-event/load-activities', {nid: nid, filter: filter});
        }

        $('#btn-save-activity').click(function(e) {
          var activity_name = $('#activity-name').val();
          var type = $('#activity-type').val();
          var contact = $('#select-contact').val();
          var date = $('#activity-date').val();

          var proceed = false;
          var error = '';

          if (type == '' || contact == '' || date == '') {
            error = error + 'Type, Contact and Date fields are required.';
            proceed = false;
          }
          else {
            if (type == 'others' && activity_name == '') {
              error = error + 'Activity Name is required when choosing "others" for the type field.';
              proceed = false;
            }
            else {
              proceed = true;
            }
          }

          var close = '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
          var div_error = '<div class="alert alert-danger">' + close + error + '</div>';

          if (proceed) {
            $.ajax({
              url: '/be-event/save-activity',
              method: 'POST',
              data: {
                nid: nid,
                activity_name: activity_name,
                type: type,
                contact: contact,
                date: date,
              },
              success: function(result){
                var success = 'Successfully added new activity.';
                var div_success = '<div class="alert alert-success">' + close + success + '</div>';
                $('.event-error-container').html(div_success);
                refreshRecentActivities('all');
              },
            });
          }
          else {
            $('.event-error-container').html(div_error);
          }

          e.preventDefault();
        });

        $('#event-select-filter').change(function() {
          var filter = $(this).val();
          $('#recent-activities-container').load('/be-event/load-activities', {nid: nid, filter: filter});
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);