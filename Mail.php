<?php
include_once ('config.php');

require_once ("class.phpmailer.php");
class Gallery_Mail {

    protected $_mail;

    public function __construct() {

        $this->_mail = new PHPMailer ();
        $this->_mail->IsSMTP ();
        $this->_mail->IsHTML();
        $this->_mail->CharSet = 'UTF-8';
        

            $this->_mail->Host = MAIL_HOST;
            $this->_mail->Port = MAIL_PORT;
            $this->_mail->From = MAIL_FROM;
            $this->_mail->FromName = MAIL_FROMNAME;

            if (MAIL_AUTH == 'true') {
                $this->_mail->SMTPAuth = MAIL_AUTH;
                $this->_mail->Username = MAIL_USERNAME;
                $this->_mail->Password = MAIL_PASSWORD;
                $this->_mail->SMTPSecure = MAIL_SECURE;
            }

    }

    public function send($tos, $subject, $body, $attachments = null, $attachments_name = null, $ccs = null, $bccs = null) {
        if (is_array ( $tos )) {
            foreach ($tos as $to) {
                $this->_mail->AddAddress($to);
            }
        } else {
            $this->_mail->AddAddress($tos);
        }
        $this->_mail->Subject = $subject;
        $this->_mail->Body = $body;

        if (is_array ( $attachments )) {
            foreach ( $attachments as $attach ) {
                $this->_mail->AddAttachment ( $attach );
            }
        } elseif ($attachments != null) {
            $this->_mail->AddAttachment ( $attachments, $attachments_name );
        }

        if(isset($ccs)){
            if (is_array ( $ccs )) {
                foreach ($ccs as $cc) {
                    $this->_mail->AddCC($cc);
                }
            } else {
                $this->_mail->AddCC($ccs);
            }
        }
        
        if(isset($bccs)){
            if (is_array ( $bccs )) {
                foreach ($bccs as $bcc) {
                    $this->_mail->AddBCC($bcc);
                }
            } else {
                $this->_mail->AddBCC($bccs);
            }
        }
        
        if (!$this->_mail->Send ()) {
            return false;
        }
    }
    
    
    public function addEmbeddedImage($path, $cid, $name = ''){
        return $this->_mail->AddEmbeddedImage($path, $cid, $name);
    }
	
}

