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
        //var nid = $('.be-create-event').attr('node-id');

        function refreshCalendarTabTasks(filter, offset) {
          $('#calendar-tab-tasks').load('/be-event/calendar-load-tasks', {filter: filter, offset: offset}, function() {
            console.log('done');
          });
        }

        /*$('#btn-save-activity').click(function(e) {
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
                priority: '',
                event_type: 'activity',
              },
              success: function(result){
                var success = 'Successfully added new activity.';
                var div_success = '<div class="alert alert-success">' + close + success + '</div>';
                $('.event-error-container').html(div_success);
                $('#event-select-filter').val('all').change();
                refreshRecentActivities('all');
              },
            });
          }
          else {
            $('.event-error-container').html(div_error);
          }

          e.preventDefault();
        });*/

        $('#btn-save-task').click(function(e) {
          var task_name = $('#task-name').val();
          var type = $('#task-type').val();
          var assigned_to = $('#task-assigned-to').val();
          var date = $('#task-date').val();
          var priority = $('#task-priority').val();

          var proceed = false;
          var error = '';

          if (type == '' || assigned_to == '' || date == '' || priority == '') {
            error = error + 'Type, Contact, Priority and Date fields are required.';
            proceed = false;
          }
          else {
            if (type == 'others' && task_name == '') {
              error = error + 'Task Name is required when choosing "others" for the type field.';
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
              url: '/be-event/save-task',
              method: 'POST',
              data: {
                nid: '',
                task_name: task_name,
                type: type,
                assigned_to: assigned_to,
                date: date,
                priority: priority,
                event_type: 'task',
              },
              success: function(result){
                var success = 'Successfully added new task.';
                var div_success = '<div class="alert alert-success">' + close + success + '</div>';
                $('.task-event-error-container').html(div_success);
                $('#event-select-filter').val('all').change();
                refreshCalendarTabTasks('all', 0);
              },
            });
          }
          else {
            $('.task-event-error-container').html(div_error);
          }

          e.preventDefault();
        });

        $('#task-select-filter').change(function() {
          var filter = $(this).val();
          $('#data-offset').val(0);
          refreshCalendarTabTasks(filter, 0);
        });

        $('#task-prev').click(function(e) {
          var filter = $('#task-select-filter').val();
          var offset = $('#data-offset').val();
          if (parseInt(offset) > 0) {
            var new_offset = parseInt(offset) - 10;
            $('#data-offset').val(new_offset);
            refreshCalendarTabTasks(filter, new_offset);
          }
          e.preventDefault();
        });

        $('#task-next').click(function(e) {
          var filter = $('#task-select-filter').val();
          var offset = $('#data-offset').val();
          if ($('.be-task-row').length == 10) {
            var new_offset = parseInt(offset) + 10;
            $('#data-offset').val(new_offset);
            refreshCalendarTabTasks(filter, new_offset);
          }  
          e.preventDefault();
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);