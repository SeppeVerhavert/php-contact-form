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
            <p> <?php print_r($errors); ?></p>
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

<?php
$errors = array();

$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

if($name = "" ) {
    $errors['name'] = "Please fill in your full name.";
}

if($email = "" ) {
    $errors['email'] = "Please fill in your email-adress.";
}

if($message = "" ) {
    $errors['message'] = "Please fill in a message.";
}


if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Your email is valid";
} else {
    $errors['email'] = "This email-address is invalid.";
}

if (count($errors) > 0) {
    $errors[0] = "There are mistakes!";
    exit;
}

// function displayErrors() {
    
// }
?>