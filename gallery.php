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
    <script>
                /*submiting the pic to the back end php*/
            // if (document.getElementById("form").addEventListener("click", sub))
            // {
            function sub(){
                const forms = document.getElementById('form');
                forms.addEventListener("submit", e => {
                    e.preventDefault();
                    const fd = new FormData(form);
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", form.action);
                    xhr.send(fd);
                });
            }
    </script>

</body>
</html>