<?php
    include_once("./userauth.php");
    $retrive = array();
    $not_val = "";
    foreach($_POST as $key => $value)
        $retrive[$key] = $value;
    if ($retrive["email"] && $retrive["submit"]) {
        $va = new userauth();
        if ($va->passwordreset($retrive["email"])){
            echo "aaa";
            // $not_val = "Password reset email is sent to your account";
            header('location: login.php?not_val=Password+reset+email+is+sent+to+your+account+click+on+the+link+to+reset');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/publicgallery.css">
    <title>Forgot Password</title>
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
                <div><?php echo $not_val;?></div>
                <form action="forgotpass.php" method="POST">
                    <p><input type="email" name="email" id="email" placeholder="Email" required></p>
                    <p> <input type="submit" value="submit" name="submit" id="submit"></p>
                </form>
            </div>
            <div>
                <p> <a href="./login.php">Login</a></p>
            </div>
        </div>
        <div class="box-2">
            <p>Don't have an account? <a href="registration.php">Sign up</a></p>
        </div>
    </div>

</body>

</html>