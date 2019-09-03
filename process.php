<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

require './vendor/autoload.php';

$mail = new PHPMailer;

// Form Data
$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['mobile'];
$msg = $_POST['msg'];
$body ='<div style="background-color: #9fffcb"><h1 align=center>Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['msg'].'<br>Phone: '.$_POST['phone'].'</h1> </div>';

$mail->isSMTP();


//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

$mail->Host = 'smtp.gmail.com';

// $mail->Port = 465;
$mail->Port = 587;

// $mail->SMTPSecure = 'ssl';
$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = "william28ache@gmail.com";

$mail->Password = "oqflykentpumvvmz";

$mail->setFrom($_POST['email'],$_POST['name']);

$mail->addReplyTo($_POST['email'],$_POST['name']);

$mail->addAddress('william28ache@gmail.com');

$mail->Subject = 'Form Submission: '.$_POST['subject'];


$mail->msgHTML(($body));

//send the message, check for errors
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'success';
}

?>