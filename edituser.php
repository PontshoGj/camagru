<?php
    include('edituser2.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/publicgallery.css">
  
</head>
<body>
    <?php
        include('./nav.php');
    ?>
    <div style="overflow: auto;">
        <div>
            <?php         
                $rq = new usermanagment();
                $hol = $rq->selectuser($_SESSION['username']);
            ?>
            <form action="edituser.php" method="post">
                <p><h2>Change User Details</h2></p><br/>
                <p><?php echo $ba; ?> </p>
                <p><input type="email" name="email" id="email" placeholder="<?php echo $hol[0]['email']; ?>" value="<?php echo $hol[0]['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid email format"></p>
                <p> <input type="text" name="username" placeholder="<?php echo $hol[0]['username'] ?>" value="<?php echo $hol[0]['username'] ?>" id="username" pattern="[A-Za-z0-9]{6,}"></p>
                <p><input type="checkbox" name="email_preference"  <?php include('chk.php'); ?> > Receive email Notification?</p><br/>
                <p><input type="submit" value="Update" name="submit" id="submit"></p>
            </form>
        </div>
        <br/><br/><br/>
        <div>
            <form action="edituser.php" method="POST">
                <p><h2>Change Password</h2></p><br/>
                <p><?php echo $a; ?> </p>
                <p><input type="password" name="password" id="password"  placeholder=" Change Password" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></p>
                <p><input type="password" name="chkpassword" id="password"  placeholder=" Change Password" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></p><br/>
                <input type="submit" name="submit" value="reset">
            </form>
        </div>
    </div>
    <?php
        include('./footer.php');
    ?>
</body>
</html>