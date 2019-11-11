<?php
session_start();
$not_val = " ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pontsho mogwere">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/publicgallery.css">
    <title>Login</title>
</head>

<body>
    <?php include('./nav.php'); ?>
    <div class="Container">
        <div class="box-1">
            <div>
                <p>
                    <h1>CAMAGRU</h1>
                </p>
            </div>
            <div class="form_reg"> 
                <div><?php echo (isset($_GET['not_val'])) ?  $_GET['not_val'] : $not_val; ?></div>
                <form action="login2.php" method="POST">
                    <p><input type="text" name="username" placeholder="Username or Email" size="25vw" style="margin-bottom:2vh; margin-top:2vh" id="username" required></p>
                    <p><input type="password" name="password" id="password" placeholder="Password" style="margin-bottom:2vh;" autocomplete="off" size="25vw" required></p>
                    <p> <input type="submit" value="Login" name="submit" id="submit" autocomplete="off" style="margin-bottom:2vh;"></p>
                </form>
            </div>
            <div>
                <p> <a href="forgotpass.php">forgot password</a></p>
            </div>
        </div>
        <div class="box-2">
            <p>Don't have an account? <a href="registration.php">Sign up</a></p>
            <p>Gallery <a href="publicgallery.php">Gallery</a></p>
        </div>
    </div>

</body>

</html>