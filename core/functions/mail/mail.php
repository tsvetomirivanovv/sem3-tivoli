<?php
require '../../../phpmailer/PHPMailerAutoload.php';

function sendMail($to, $subject, $message) {
    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'postmaster@tivoliapp.c0dex.co';   // SMTP username
    $mail->Password = '25706daf439527e125efdb0d97c6cf26';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

    $mail->From = 'teodor@tivoliapp.c0dex.co';
    $mail->FromName = 'Tivoli App';
    $mail->addAddress($to);                 // Add a recipient

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters

    $mail->Subject = $subject;
    $mail->Body = $message;

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}