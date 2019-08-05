<?php
$errors = array();

$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

if (empty($name)) {
    $errors['0'] = "Please fill in your full name. <br>";
}

if (empty($email)) {
    $errors['1'] = "Please fill in your email-adress. <br>";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['3'] = "This email-address is invalid. <br>";
}

if (empty($message)) {
    $errors['2'] = "Please fill in a message. <br>";
}

function displayErrors()
{
    for ($x = 0; $x < 4; $x++) {
        if (!empty($GLOBALS['errors'][$x])) {
            echo "<li>";
            print_r($GLOBALS['errors'][$x]);
            echo "</li>";
        }
    }
}

function sendMail() {
    require('phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <div class="container">
        <h1>Contact us</h1>
        <div class="errors">
            <ul> <?php
                    if (count($errors) > 0) {
                        displayErrors();
                    } else {
                        sendMail();
                    }; ?>
            </ul>
        </div>
        <div class="form">
            <form action="" method="post">
                <p>Full name</p>
                <input type="text" name="name" placeholder="Full name"><br>
                <p>Email (*)</p>
                <input type="text" name="email" placeholder="Email"><br>
                <p>Your message</p>
                <textarea rows="5" cols="30" name="message" placeholder="Write your message here."></textarea>
                <br>
                <input type="submit" value="send">
            </form>
        </div>
    </div>
</body>

</html>