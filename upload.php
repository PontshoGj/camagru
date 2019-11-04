<?php
include('./upload2.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
</head>
<body>
    <div id="<?php echo $displayhd; ?>">
        <form action="./upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">Upload</button>
        </form>
    </div>
    <div class="controller" id="<?php echo $display; ?>" style="display: none;">
        <form action="./upload.php" method="POST" enctype="multipart/form-data">
            <div>
                <img id="dimage"  src="<?php echo $base64; ?>"  style="width: 450px;hight: 450px;">
                bat<input type="radio" id="rad" name="rad" value="bat">
                glass<input type="radio" id="rad" name="rad" value="glass">
                tree<input type="radio" id="rad" name="rad" value="tree">
                <!-- <input type="hidden" value="<?php echo $base64; ?>" name="dimage"> -->
                <button type="submit" name="merge">Upload</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById("hidden").style.display = "initial";
        document.getElementById("hid").style.display = "none";
    </script>
     <a href="logout.php">logout</a>
</body>
</html>