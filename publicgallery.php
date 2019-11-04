<?php
    include('./displaycomments.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/publicgallery.css">
    <script>
        function displays($val, $datess)
        {
            document.getElementById($val).style.display = "initial";
            document.getElementById($datess).style.display = "none";
        }
    </script>
</head>
<body>
    <div class="header">
        <ul>
            <?php
                if ($_SESSION["username"])
                {
                    echo '<li><a href="gallery.php">Profile</a></li>';
                    echo '<li><a href="logout.php">logout</a></li>';
                    echo '<li><a href="publicgallery.php">public</a></li>';
            // echo $_SESSION["username"];
                }else
                {
                    echo '<li><a href="login.php">login</a></li> ';
                    echo '<li><a href="registration.php">Register</a></li>';
                }
            ?>
        </ul>
    </div>
    <div>
        <?php include('./publicgallerydisplayimg.php'); ?>
    </div>

</body>
</html>