<?php
    include_once('./sessionmanagement.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/publicgallery.css">
    <title>Profile</title>
</head>
<body>
    <?php include('./nav.php'); ?>
    <div style="overflow: auto;"><?php include('./gallerydisplyimg.php'); ?></div>
    <?php include('./footer.php'); ?>
</body>
</html>