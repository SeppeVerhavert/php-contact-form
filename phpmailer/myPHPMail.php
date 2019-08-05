<?php

require('phpmailer/PHPMailer.php');

    $mail = new PHPMailer();
    echo "yay";
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls/ssl";
    $mail->Port     = 587;
    $mail->Username = "Seppe Verhavert";
    $mail->Password = "pqt5kku2";
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom($GLOBALS['email'], $GLOBALS['name']);
    $mail->AddReplyTo($GLOBALS['email'], "PHPPot");
    $mail->AddAddress("seppe.verhavert@gmail.com");
    $mail->Subject = "Test email using PHP mailer";
    $mail->WordWrap   = 80;
    $content = $GLOBALS['message'];
    $mail->MsgHTML($content);
    $mail->IsHTML(true);
    if (!$mail->Send())
        echo "Problem sending email.";
    else
        echo "email sent.";
?>