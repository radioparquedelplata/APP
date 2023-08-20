<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();     
    //$mail->CharSet = "utf-8";// Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'no-reply@edgemusic.com';                 // SMTP username
    $mail->Password = 'EmnDev0123!';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    //Recipients
    $mail->setFrom('no-reply@edgemusic.com', 'Mailer');
    $mail->addAddress('ekamsoftwares123@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress('ekamsoftwares123@gmail.com');               // Name is optional
    $mail->addReplyTo('no-reply@edgemusic.com', 'Information');
 

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial,  Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">
	<tr>
	<td class="content-cell" style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; padding: 35px; word-break: break-word;">
	<h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Hi fg,</h1>
	<p style="box-sizing: border-box; color: #74787E; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">You recently requested to reset your password for your account. Use the button below to reset it. <strong style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">This password reset is only valid for the next 24 hours.</strong></p>

	<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
	<tr>
	<td align="center" style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; word-break: break-word;">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif;">
	<tr>
	<td align="center" style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; word-break: break-word;">
	<table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif;">
	<tr>
	<td style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; word-break: break-word;">
	<a href="{{action_url}}" class="button button--green" target="_blank" style="-webkit-text-size-adjust: none; background: #22BC66; border-color: #22bc66; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, Helvetica, sans-serif; text-decoration: none;">Reset your password</a>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<p style="box-sizing: border-box; color: #74787E; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks,
	<br />The Tv app Team</p>
	</td>
	</tr>
	</table>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}