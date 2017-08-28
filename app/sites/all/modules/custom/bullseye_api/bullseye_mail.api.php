<?php
class AttachmentEmail {
  private $from = '';
  private $from_name = '';
  private $reply_to = '';
  private $to = '';
  private $subject = '';
  private $message = '';
  private $attachments = array();

  /**
   * Function for defining email
   *
   * @param $to
   *   Email recipient address
   *
   * @param $from
   *   Email sender address
   *
   * @param $message
   *   Message text of body. (currenlty plain text only)
   *
   * @param $attachment (optional)
   *    An array containing attachment file name and path
   *    array('filename' => 'attachment.pdf', 'uri' => '/tmp/attachment.pdf')
   **/
  public function __construct($to, $from, $subject, $message, $attachments = array()) {
    $this->to = $to;
    $this->from = $from;
    $this->subject = $subject;
    $this->message = $message;
    $this->attachments = $attachments;
  }

  /**
   * Hook for sending actual email.
   **/
  public function send() {
    if (!empty($this->attachments)) {
      $mailto = $this -> to;
      $from_mail = $this -> from;
      $from_name = $this -> from_name;
      $replyto = $this -> reply_to;
      $subject = $this -> subject;
      $message = $this -> message;
      $mime_boundary = "==Multipart_Boundary_x". md5(mt_rand()) ."x";
      $uid = md5(uniqid(time()));
      $header = "From: " . $from_mail . "\r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
      $header .= "This is a multi-part message in MIME format.\r\n";
      $header .= "--".$uid."\r\n";
      $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
      $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
      $header .= $message."\r\n\r\n";
      $header .= "--".$uid."\r\n";

      foreach ($this->attachments as $attachment) {
        $filename = empty($attachment['filename']) ? basename($attachment['uri']) : $attachment['filename'];
        $path = dirname($attachment['uri']);
        $part = file_get_contents($path);
        $content = chunk_split(base64_encode($part));
        $header .= "--".$uid."\r\n";
        $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use diff. tyoes here
        $header .= "Content-Transfer-Encoding: base64\r\n";
        $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
        $header .= $content ."\r\n\r\n";

      }

      $header .= "--".$uid."--";

      if (mail($mailto, $subject, "", $header)) {
        return TRUE;
      }
      else {
        return FALSE;
      }
    }
    else {
      $header = "From: ".($this -> from_name)." <".($this -> from).">\r\n";
      $header .= "Reply-To: ".($this -> reply_to)."\r\n";

      if (mail($this -> to, $this -> subject, $this -> message, $header)) {
        return TRUE;
      }
      else {
        return FALSE;
      }
    }
  }
}
