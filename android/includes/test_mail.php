<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('../vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
try {
   $content='Hello there';
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'ssl://smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
       $mail->Username   = 'kics@nigoote.com';                        //SMTP username
 $mail->Password   = 'Enock@123';                                //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->setFrom('kics@nigoote.com');
    //Recipients
    $mail->addAddress('ask@nigoote.com');    
        $mail->addReplyTo('kics@nigoote.com');
    //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('info@rmceducation.org');               //Name is optional
    $mail->addReplyTo('info@rmceducation.org', 'RMC-EDUCATION SYSTEM');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //Content
 
  
    // strip backslashes
 
    // mail settings below including these:
    $mail->MsgHTML($content);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test';

  
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Done!';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>