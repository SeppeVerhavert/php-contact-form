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
            <form action="welcome.php" method="post">
                Full name<input type="text" name="name" placeholder="Full name"><br>
                Email (*)<input type="text" name="email" placeholder="email"><br>
                Your message<input type="submit" value="send">

                Welcome <?php echo $_POST["name"]; ?><br>
                Your email address is: <?php echo $_POST["email"]; ?>
            </form>
        </div>
    </div>
</body>

</html>