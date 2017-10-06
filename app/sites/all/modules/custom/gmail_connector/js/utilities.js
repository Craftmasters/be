/**
 * @file
 * Javascript file for the Gmail Connector.
 *
 * Javascript file for the Google Connector.
 */

/* global Drupal Pace gapi window to:true body:true subject:true btoa jQuery alert setTimeout data_length:true */
/* eslint strict: [2, "never"]*/

(function ($) {
  Drupal.behaviors.gmail_connector = {
    attach: function(context, settings) {
      Pace.start();

      var dataSet = [];
      var mailBody = [];

      // Load the client for javascript API.
      $.getScript(
        'https://apis.google.com/js/client.js', function() {
          gapi.load('auth:client', handleClientLoad);
        }
      );

      // Google Javascript API Calls.
      var clientId = Drupal.settings.gmail_connector.config.google_client_id;
      var apiKey = Drupal.settings.gmail_connector.config.google_api_key;
      // Var scopes = 'https://www.googleapis.com/auth/gmail.readonly';
      var scopes = 'https://mail.google.com/';

      // Handles client load.
      function handleClientLoad() {
        gapi.client.setApiKey(apiKey);
        window.setTimeout(checkAuth, 1);
      }

      /**
       * Check if current user has authorized this application.
       */
      function checkAuth() {
        gapi.auth.authorize({
          client_id: clientId,
          scope: scopes,
          immediate: true
        }, handleAuthResult);
      }

      /**
       * Initiate auth flow in response to user clicking authorize button.
       *
       * @param {Event} event Button click event.
       */
      function handleAuthClick() {
        gapi.auth.authorize({
          client_id: clientId,
          scope: scopes,
          immediate: false
        }, handleAuthResult);

        return false;
      }

      /**
       * Handle response from authorization server.
       *
       * @param {Object} authResult Authorization result.
       */
      function handleAuthResult(authResult) {
        if (authResult && !authResult.error) {

          loadGmailApi();

          $('#authorize-button').remove();
          $('#google-inbox_wrapper').show();
          $('#send-button').removeClass("hidden");
          $('#email-send').on('click', function() {
            var userId = 'me';
            var email = 'imran031387@gmail.com';
            to = $("input#email-to").val();
            body = $("#email-body").val();
            subject = $("#email-subject").val();
            sendMessage(userId, email, sendMessageSuccess);
          });
        }
        else {
          $('#authorize-button').removeClass("hidden");
          $('#authorize-button').on('click', function() {
            handleAuthClick();
          });
        }
      }

      /**
       * Load Gmail API client library. List labels once client library is loaded.
       */
      function loadGmailApi() {
        gapi.client.load('gmail', 'v1', displayInbox);
      }

      /**
       * Display the inbox.
       */
      function displayInbox() {
        var request = gapi.client.gmail.users.messages.list({
          userId: 'me',
          labelIds: 'INBOX',
          maxResults: Drupal.settings.gmail_connector.config.google_email_display
        });

        request.execute(function(response) {
          data_length = response.messages.length;
          $.each(response.messages, function() {
            var messageRequest = gapi.client.gmail.users.messages.get({
              userId: 'me',
              id: this.id
            });

            messageRequest.execute(appendMessageRow);
          });
        });
      }

       /**
       * Display the inbox.
       */
      function displaySentItems() {
        var request = gapi.client.gmail.users.messages.list({
          userId: 'me',
          labelIds: 'SENT',
          maxResults: Drupal.settings.gmail_connector.config.google_email_display
        });

        request.execute(function(response) {
          data_length = response.messages.length;
          $.each(response.messages, function() {
            var messageRequest = gapi.client.gmail.users.messages.get({
              userId: 'me',
              id: this.id
            });

            messageRequest.execute(appendMessageRow);
          });
        });
      }

      /**
       * Append message in a row.
       */
      function appendMessageRow(message) {
        // console.log(message);
        // console.log('length ::: '+dataSet.length);.
        var del_btn = '<button id="' + 'delete-button-' + message.id + '" class="btn btn-primary email-delete" data-id="' + message.id + '">Delete</button>';
        var mail_link = '<a href="#message-modal-' + message.id +
          '" data-toggle="modal" id="message-link-' + message.id + '" data-lid="' + message.id + '">' +
          getHeader(message.payload.headers, 'Subject') + '</a>';
        var dataArray = [getHeader(message.payload.headers, 'From'), mail_link, getHeader(message.payload.headers, 'Date'), del_btn];

        dataSet.push(dataArray);
        // Mail body Array.
        mailBody[message.id] = getBody(message.payload);

        $('body').append(
          '<div class="modal fade" id="message-modal-' + message.id +
            '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >\n' +
            '<div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n' +
            '<h4 class="modal-title" id="myModalLabel">' +
            getHeader(message.payload.headers, 'Subject') +
            '</h4></div><div class="modal-body"><iframe id="message-iframe-' + message.id + '"srcdoc="<p>Loading...</p>"></iframe>\n' +
          '</div></div></div></div>'
        );

        if (dataSet.length === data_length) {
          $('#google-inbox').DataTable({
            data: dataSet,
            columns: [
              {title: "From"},
              {title: "Subject"},
              {title: "Date/Time"},
              {title: "Actions"}
            ]
          });

          Pace.stop();

          $('[id^="delete-button-"]').on('click', function() {
            deleteMessage('me', $(this).data("id"));
          });

          $('[id^="message-link-"]').on('click', function() {
            var ifrm = $('#message-iframe-' + $(this).data("lid"))[0].contentWindow.document;
            $('body', ifrm).html(mailBody[$(this).data("lid")]);
            $('#message-iframe-' + $(this).data("lid")).contents().find('body').css('white-space', 'pre');
          });
        }
      }

      /**
       * Get the header.
       */
      function getHeader(headers, index) {
        var header = '';
        $.each(headers, function() {
          if (this.name === index) {
            header = this.value;
          }
        });

        return header;
      }

      /**
       * Get the body.
       */
      function getBody(message) {
        var encodedBody = '';
        if (typeof message.parts === 'undefined') {
          encodedBody = message.body.data;
        }
        else {
          encodedBody = getHTMLPart(message.parts);
        }
        encodedBody = encodedBody.replace(/-/g, '+').replace(/_/g, '/').replace(/\s/g, '');

        return decodeURIComponent(escape(window.atob(encodedBody)));
      }

      /**
       * Get htmlpart.
       */
      function getHTMLPart(arr) {
        for (var x = 0; x <= arr.length; x++) {
          if (typeof arr[x].parts === 'undefined') {
            if (arr[x].mimeType === 'text/html') {
              return arr[x].body.data;
            }
          }
          else {
            return getHTMLPart(arr[x].parts);
          }
        }

        return '';
      }

      /**
       * Send Message.
       *
       * @param {String} userId User's email address. The special value 'me'
       * can be used to indicate the authenticated user.
       * @param {String} email RFC 5322 formatted String.
       * @param {Function} sendMessageSuccess Function to call when the request is complete.
       */
      function sendMessage(userId, email, sendMessageSuccess) {
        var base64EncodedEmail = btoa(
              "Content-Type:  text/plain; charset=\"UTF-8\"\n Content-length: 5000\n Content-Transfer-Encoding: message/rfc2822\n" +
              "to: " + to + "\n" +
              "subject: " + subject + "\n\n" + body
          ).replace(/\+/g, '-').replace(/\//g, '_');

        var request = gapi.client.gmail.users.messages.send({
          userId: 'me',
          resource: {
            raw: base64EncodedEmail
          }
        });

        request.execute(sendMessageSuccess);
      }

      /**
       * Success message delivery.
       */
      function sendMessageSuccess() {
        $('#model-email-success').show();
        setTimeout(emailSuccess, 1000);
      }

      /**
       * Email successful.
       */
      function emailSuccess() {
        $('#model-email-success').hide();
        $('#message-modal-compose').modal('hide');
      }

      /**
       * Delete Message with given ID.
       *
       * @param {String} userId User's email address. The special value 'me'
       * can be used to indicate the authenticated user.
       * @param {String} messageId ID of Message to delete.
       */
      function deleteMessage(userId, messageId) {
        var request = gapi.client.gmail.users.messages.delete({
          userId: userId,
          id: messageId
        });

        request.execute(function(resp) {
          alert('Message Successfully Deleted');
          window.location.reload();
        });
      }
    }
  };
})(jQuery);
