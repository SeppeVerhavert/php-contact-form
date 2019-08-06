<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'seppe.verhavert@gmail.com';                     // SMTP username
    $mail->Password   = 'xqtjlscjojxmzvza';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('seppe.verhavert@gmail.com', $GLOBALS['name']);
    $mail->addAddress('seppe.verhavert@gmail.com');             // Add a recipient
    $mail->addReplyTo('seppe.verhavert@gmail.com', 'Information');

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $GLOBALS['email'];
    $mail->Body    = $GLOBALS['message'];
    $mail->AltBody = $GLOBALS['message'];

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>