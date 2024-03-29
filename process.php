<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/OAuth.php';
require './vendor/autoload.php';

$mail = new PHPMailer;



try{
// Form Data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['msg'];
$body ='<div style="background-color: #9fffcb"><h1 align=center>Name: '.$name .'<br>Email: '.$email .'<br>Message: '.$msg .'<br>Phone: '.$phone .'</h1> </div>';
//Server settings
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "william28ache@gmail.com";
$mail->Password = "oqflykentpumvvmz";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;


//Recipients
$mail->setFrom('william28ache@gmail.com',$name);
$mail->addAddress('william28ache@gmail.com');
$mail->addReplyTo('william28ache@gmail.com',$name);
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');


 // Content
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->msgHTML(($body));


$mail->send();
echo 'Message has been sent';
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>