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

        $('#sfi-pdf-load').load('/be-cp/dip-load-sfi', {nid: nid});

        // Refresh classes of current progress block.
        function refreshClasses(nid) {
          $.ajax({
            url: '/be-cp/refresh-classes-deals',
            method: 'POST',
            data: {
              nid: nid,
            },
            success: function(result){
              console.log(result);
              $('#div-gta').removeClass('gray-check no-check green-check');
              $('#div-dd').removeClass('current-step done-step');
              $('#div-gsfi').removeClass('current-step done-step');
              $('#div-sd').removeClass('current-step done-step');
              $('#div-poa').removeClass('gray-check no-check green-check');
              $('#div-rsd').removeClass('current-step done-step');
              $('#div-cp').removeClass('current-step done-step');
              $('#div-ctcd').removeClass('gray-check no-check green-check');

              $('#div-gta').addClass(result['class_gta']);
              $('#div-dd').addClass(result['class_dd']);
              $('#div-gsfi').addClass(result['class_gsfi']);
              $('#div-sd').addClass(result['class_sd']);
              $('#div-poa').addClass(result['class_poa']);
              $('#div-rsd').addClass(result['class_rsd']);
              $('#div-cp').addClass(result['class_cp']);
              $('#div-ctcd').addClass(result['class_ctcd']);

              $('#div-dd a.cp-link').attr('data-toggle', result['modal_access_dd']);
              $('#div-gsfi a.cp-link').attr('data-toggle', result['modal_access_gsfi']);
              $('#div-sd a.cp-link').attr('data-toggle', result['modal_access_sd']);
              $('#div-rsd a.cp-link').attr('data-toggle', result['modal_access_rsd']);
              $('#div-cp a.cp-link').attr('data-toggle', result['modal_access_cp']);
              $('#div-ctcd a.cp-link').attr('data-toggle', result['modal_access_ctcd']);

            },
          });
        }

        function refreshHeaderClasses(nid) {
          $.ajax({
            url: '/be-cp/header-classes',
            method: 'POST',
            data: {
              nid: nid,
              status: 'deal_in_progress',
            },
            success: function(result){
              console.log(result);
              $('#hp_gta').removeClass('be-blue be-gray be-green');
              $('#hp_poa').removeClass('be-blue be-gray be-green');
              $('#hp_ctcd').removeClass('be-blue be-gray be-green');
              $('#hp_gta').addClass(result['hp_gta']);
              $('#hp_poa').addClass(result['hp_poa']);
              $('#hp_ctcd').addClass(result['hp_ctcd']);
            },
          });
        };

        refreshHeaderClasses(nid);

        $('.be-bs-modal').on('hidden.bs.modal', function () {
          refreshClasses(nid);
        });

        // DIP - Set status to generate invoice.
        $('#btn-next-generate-invoice').click(function() {
          $.ajax({
            url: '/be-cp/dip-generate-invoice',
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

        // Add setup fee item.
        $('.setup-fee-add-container a').click(function(e) {
          var random_num = Math.floor((Math.random() * 10000000) + 1);
          var description_td = '<td><input type="text" class="sfi-description" value=""></td>';
          var quantity_td = '<td><input type="text" class="sfi-quantity" value=""></td>';
          var amount_td = '<td><input type="text" class="sfi-amount" value=""></td>';
          var delete_td = '<td><button type="button" class="sfi-delete-new"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
          var tr = '<tr class="new-data" tr-num="' + random_num + '">' + description_td + quantity_td + amount_td + delete_td + '</tr>';
          $('table.table-sfi tbody').append(tr);

          $('tr[tr-num="' + random_num + '"] button.sfi-delete-new').click(function(a) {
            $(this).closest('tr').remove();
            a.preventDefault();
          });
          e.preventDefault();
        });

        // Delete event for delete button..
        $('.sfi-delete').each(function() {
          $(this).click(function(e) {
            var item_id = $(this).closest('tr').attr('sfi-id');
            $.ajax({
              url: '/be-cp/delete-sfi',
              method: 'POST',
              data: {
                item_id: item_id,
              },
              success: function(result){
                console.log(result);
                if (result == 'success') {
                  $('tr[sfi-id="' + item_id + '"]').remove();
                }
              },
            });
            e.preventDefault();
          });
        });

        // Delete event for delete button.
        $('.sfi-delete-new').click(function(e) {
          $(this).closest('tr').remove();
          e.preventDefault();
        });

        // Save the setup fee items.
        $('#btn-save-exit-sfi').click(function(e) {
          var invoice_notes = $('#edit-invoice-notes').val();
          // Get the setup fee items data.
          var sfi = [];
          $('.table-sfi .new-data').each(function() {
            var obj = {
              'description': $(this).find('.sfi-description').val(),
              'quantity': $(this).find('.sfi-quantity').val(),
              'amount': $(this).find('.sfi-amount').val(),
            };
            sfi.push(obj);
          });

          var old_sfi = [];
          $('.table-sfi .old-data').each(function() {
            var obj = {
              'description': $(this).find('.sfi-description').val(),
              'quantity': $(this).find('.sfi-quantity').val(),
              'amount': $(this).find('.sfi-amount').val(),
              'id': $(this).attr('sfi-id'),
            };
            old_sfi.push(obj);
          });

          // Saving the setup fee items.
          $.ajax({
            url: '/be-cp/save-exit-sfi',
            method: 'POST',
            data: {
              nid: nid,
              sfi: sfi,
              old_sfi: old_sfi,
              send_document: 'no',
              invoice_notes: invoice_notes,
            },
            success: function(result){
              console.log(result);
              $.each(result, function(i, item) {
                $('tr.new-data').eq(i).attr('contact-id', item);
                $('tr.new-data').eq(i).addClass('old-data');
                $('tr.new-data').eq(i).removeAttr('tr-num');
              });

              // Binding delete event to newly added elements.
              $('tr.old-data').each(function() {
                var item_id = $(this).attr('sfi-id');
                $(this).removeClass('new-data');
                $(this).find('button.sfi-delete-new').addClass('sfi-delete');
                $(this).find('button.sfi-delete').removeClass('sfi-delete-new');
                $(this).find('button.sfi-delete').click(function() {
                  $.ajax({
                    url: '/be-cp/delete-sfi',
                    method: 'POST',
                    data: {
                      item_id: item_id,
                    },
                    success: function(result){
                      console.log(result);
                      if (result == 'success') {
                        $('tr[sfi-id="' + item_id + '"]').remove();
                      }
                    },
                  });
                });
              });

            },
          });
        });

        $('#div-sd a.cp-link').click(function(e) {
          $('#sfi-pdf-load').load('/be-cp/dip-load-sfi', {nid: nid});
        });

        // DIP - Set status to send documents.
        $('#btn-next-send-documents').click(function() {
          var invoice_notes = $('#edit-invoice-notes').val();
          // Get the setup fee items data.
          var sfi = [];
          $('.table-sfi .new-data').each(function() {
            var obj = {
              'description': $(this).find('.sfi-description').val(),
              'quantity': $(this).find('.sfi-quantity').val(),
              'amount': $(this).find('.sfi-amount').val(),
            };
            sfi.push(obj);
          });

          var old_sfi = [];
          $('.table-sfi .old-data').each(function() {
            var obj = {
              'description': $(this).find('.sfi-description').val(),
              'quantity': $(this).find('.sfi-quantity').val(),
              'amount': $(this).find('.sfi-amount').val(),
              'id': $(this).attr('sfi-id'),
            };
            old_sfi.push(obj);
          });

          // Saving the setup fee items.
          $.ajax({
            url: '/be-cp/save-exit-sfi',
            method: 'POST',
            data: {
              nid: nid,
              sfi: sfi,
              old_sfi: old_sfi,
              send_document: 'yes',
              invoice_notes: invoice_notes,
            },
            success: function(result){
              console.log(result);
              $.each(result, function(i, item) {
                $('tr.new-data').eq(i).attr('contact-id', item);
                $('tr.new-data').eq(i).addClass('old-data');
                $('tr.new-data').eq(i).removeAttr('tr-num');
              });

              // Binding delete event to newly added elements.
              $('tr.old-data').each(function() {
                var item_id = $(this).attr('sfi-id');
                $(this).removeClass('new-data');
                $(this).find('button.sfi-delete-new').addClass('sfi-delete');
                $(this).find('button.sfi-delete').removeClass('sfi-delete-new');
                $(this).find('button.sfi-delete').click(function() {
                  $.ajax({
                    url: '/be-cp/delete-sfi',
                    method: 'POST',
                    data: {
                      item_id: item_id,
                    },
                    success: function(result){
                      console.log(result);
                      if (result == 'success') {
                        $('tr[sfi-id="' + item_id + '"]').remove();
                      }
                    },
                  });
                });
              });

              refreshClasses(nid);
            },
          });

          $('#sfi-pdf-load').load('/be-cp/dip-load-sfi', {nid: nid});
        });

        // DIP - Set status to send documents.
        $('#btn-send-documents').click(function() {
          var filename = $('.show-attachment a').text();
          $('.send-document-email.modal-loading').show();
          $.ajax({
            url: '/be-cp/dip-send-documents-files',
            method: 'POST',
            data: {
              nid: nid,
              filename: filename,
              subject: $('#edit-subject').val(),
              to: $('#edit-to').val(),
              body: $('#edit-message').val(),
            },
            success: function(result){
              console.log(result);
              refreshClasses(nid);
              $('.send-document-email.modal-loading').hide();
              var message = 'Invoice successfully sent to client.'
              var close = '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
              var div = '<div class="alert alert-success">' + close + message + '</div>';
              $('.sei-error-container').html(div);
            },
          }).fail(function(jqXHR, textStatus) {
            console.log('fail');
            $('.send-document-email.modal-loading').hide();
          });
        });

      });
   
    }
  };

})(jQuery, Drupal, this, this.document);