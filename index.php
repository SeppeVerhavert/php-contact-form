<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <link rel="stylesheet" type = "text/css" href="./css/style.css">
</head>

<body>
    <div class="container">
        <h1>Contact us</h1>
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

echo $_POST["name"]; 
echo $_POST["email"];
echo $_POST["message"];

?>