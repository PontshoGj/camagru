<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
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
                echo '<div><img src="'.$display[$i]['images'].'" style="width: 450px; hight: 450px; margin-left: 450px;" ><div>';
                $i++;
            } 
        ?>
    </div>
    <div>
    <a href="login.php">login</a>
    <a href="regstration.php">Register</a>
    </div>
</body>
</html>