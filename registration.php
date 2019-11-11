<?php
    require_once("./usermanagement.php");
    require_once("./userauth.php");

    $array = array();
    $re = "";
    foreach($_POST as $key => $value)
        $array[$key] = $value;

    if (isset($array['username']) && isset($array['name']) && isset($array['email']) && isset($array['password']))
    {
        $va = new userauth();
        //echo $va->test_email($retrive['email']);
        if ($va->test_email($array['email']) && $va->test_password($array['password']) && $va->test_user($array['username']))
        {
            $reg = new usermanagment();
            $reg->setdata($array['username'], $array['name'], $array['email'], $array['password']);
            $reg->adduser();
            header("location: login.php?not_val=Account+Comfirm+email+is+sent+to+your+email+account+click+on+the+link+to+activate+your+account");
        }else{
            if (!$array['username'])
                $re = "username not available";
            if (!$array['email'])
                $re = "email not available";
            if (!$array['email'] && !$array['username'])
                $re = "email and username not available";
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
    <title>User_Registration</title>
</head>

<body>
    <?php include('./nav.php'); ?>
    <div class="Container" style="margin-left: 25vw; margin-top: 5vw; width: 45vw; height: 45vh; padding: 3vh">
        <div class="box-1">
            <div>
                <p>
                    <h1>CAMAGRU</h1>
                </p>
                <p><?php echo $re; ?></p>
                <p>Sign up to see photos and videos from your friends.</p>
            </div>
            <div class="form_reg" >
                <form action="registration.php" method="post">
                    <p><input type="email" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid email format" required size="25vw;" style="margin-top:2vh;"></p>
                    <p><input type="text" name="name" placeholder="Full Name" id="name" size="25vw;" style="margin-top:2vh;"></p>
                    <p> <input type="text" name="username" placeholder="Username" id="username" pattern="[A-Za-z0-9]{6,}" autocomplete="off"  required size="25vw;" style="margin-top:2vh;"></p>
                    <p><input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" autocomplete="off"  size="25vw;" style="margin-top:2vh;margin-bottom:2vh;" required title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></p>
                    <p><input type="submit" value="Sign Up" name="submit" id="submit" style="margin-bottom:2vh;"></p>
                </form>
            </div>
            <div>
                <p>By signing up, you agree to our Terms , Data Policy and Cookies Policy .</p>
            </div>
        </div>
        <div class="box-2">
            <p>Have an account? <a href="login.php">Login</a></p>
        </div>
    </div>

</body>

</html>