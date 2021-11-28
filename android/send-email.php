<?php

function sendingEmail($to,$subject,$message){

$from = "kics@nigoote.com";
 // $to="ndagijimanaenock11@gmail.com";
  
    // $subject = "Prood Of registration";
    // $message = "Dear Student, Your Registration is Successful done!";

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: '.$from. "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
    mail($to,$subject,$message, $headers);
 }




// $from = "kics@nigoote.com";
//  $mail="ndagijimanaenock11@gmail.com";
//     $to = $mail;


//     $subject = "Prood Of registration";
//     $message = "Dear Student, Your Registration is Successful done!";
// $headers =  'MIME-Version: 1.0' . "\r\n"; 
// $headers .= 'From: '.$from. "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
//     mail($to,$subject,$message, $headers);
// header('location:new-account.php');

?>