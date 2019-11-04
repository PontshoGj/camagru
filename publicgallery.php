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
                include('./nav.php');
            ?>
        </ul>
    </div>
    <div>
        <?php include('./publicgallerydisplayimg.php'); ?>
    </div>

</body>
</html>