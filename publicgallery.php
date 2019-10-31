<?php
    session_start();
    $retrive = array();
    $not_val = "";
    foreach($_POST as $key => $value)
        $retrive[$key] = $value;
    if ($_SESSION["username"]  && $retrive['submit'])
    {
        if($retrive['comment'] && $retrive['userid'] && $_SESSION['username'])
        {
            include('commentnlike.php');
            $ad = new commentnlike();
            $ad->addcomment($retrive['comment'], $_SESSION['username'], $retrive['userid']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <script>
        function displays($val, $datess)
        {
            document.getElementById($val).style.display = "initial";
            document.getElementById($datess).style.display = "none";
        }
    </script>
</head>
<body>
    <div>
        <?php
            include_once('./picdb.php');
            $arr = new picdb();
            $display = $arr->getall();
            $i = 0;
            while($i < count($display))
            {
                echo '<div style="width: 450px; hight: 450px; margin-left: 450px; margin-bottom: 30px;"><div><img src="'.$display[$i]['images'].'" style="width: 450px; hight: 450px;"></div>';
                if($_SESSION['username'])
                {
                    echo '<div id="'.$display[$i]['timess'].'"><button id="'.$display[$i]['timess'].'" onclick="displays('.$display[$i]['num'].','.$display[$i]['timess'].' )">comment</button>';
                    echo '<form action="publicgallery.php" method="post"><button id="'.$display[$i]['timess'].'" type="submit" value="'.$display[$i]['num'].'">like</button></form></div><br/>';

                    echo '<div id="'.$display[$i]['num'].'" style="display:none;"><form action="publicgallery.php" method="post"><textarea name="comment"  id="'.$display[$i]['num'].'" rows="4" cols="50"></textarea>';
                    echo '<input type="hidden" name="userid" value="'.$display[$i]['userid'].'">';
                    echo '<button type="submit" value="comment" id="'.$display[$i]['num'].'" name="submit">comment</button></form></div>';
                }
                echo '</div>';
                $i++;
            } 
        ?>
    </div>
    <div>
    <?php
        if ($_SESSION["username"])
        {
            echo '<a href="gallery.php">Profile</a> ';
            echo '<a href="logout.php">logout</a>';
            // echo $_SESSION["username"];
        }else
        {
            echo '<a href="login.php">login</a> ';
            echo '<a href="registration.php">Register</a>';
        }
    ?>
    </div>

</body>
</html>