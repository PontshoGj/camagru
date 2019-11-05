<?php
    include_once('./sessionmanagement.php');
    include_once('picpro.php');
    if ($_POST['ims'])
    {
        include('savimg.php');
        $ar = new saveimg();
        $ar->saveimg($_POST['ims'], $_SESSION['username']);
        $s = shell_exec('rm merge.png');
        header("Location: gallery.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/publicgallery.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Edit</title>
 
</head>
<body>
    <?php
        include('./nav.php');
    ?>    
    <div style="float: left; margin-left: 500px;">
        <form actio="cam.php" method="post">
            <div class="video-wrap" >
                <video id="video" playsinline autoplay></video>
            </div>

                <input type="hidden" value="" id="image" name="image">
            <div class="controller">
                <button id="snap" type="submit">Capture</button>
                bat<input type="radio" id="rad" name="rad" value="bat">
                glass<input type="radio" id="rad" name="rad" value="glass">
                tree<input type="radio" id="rad" name="rad" value="tree">
            </div>

            <canvas id="canvas" width="450" height="450" style="float:left;"></canvas>
        </form>
    </div>
    <div style="float: right; width: 400px; hight: auto;">
        <form id="myForm" action="cam.php" method="post">
        <?php
            include_once('./picdb.php');
            $arr = new picdb();
            $display = $arr->getsave();
            $i = 0;
            while($i < count($display))
            {
                echo '<img class="w3-button" id="s" onclick="myFunction()" name="ims" src="'.$display[$i]['images'].'"  width=100 height=100 value="'.$display[$i]['images'].'">';
                echo '<input type="hidden" name="ims" value="'.$display[$i]['images'].'">';
                $i++;
            } 
        ?>
        </form>
    </div>
    <?php include('./footer.php'); ?>
    <!-- <div id="imagediv">
         <img src="" id="saveimage" style="float: left; border: 1px solid black; margin-left: 10px;">
    </div> -->
    <script>
            'use strict';
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const snap = document.getElementById('snap');
            const image = document.getElementById("image");
            const errorMsgElement = document.getElementById('span#ErrorMsg');
            const constraints = {
                video:{
                    width: 450, height: 450
                }
            };
            async function init()
            {
                try {
                    const stream = await navigator.mediaDevices.getUserMedia(constraints);
                    handleSuccess(stream);
                } catch (e) {
                    errorMsgElement.innerHTML = 'navigator.getUserMedia.error:${e.toString()}';
                }
            }
            function handleSuccess(stream){
                window.stream = stream;
                video.srcObject = stream;
            }
            init();
            var context = canvas.getContext('2d');
            snap.addEventListener("click", function(){
                context.drawImage(video, 0, 0, 450, 450);
                const dataURI = canvas.toDataURL();
                image.setAttribute('value', dataURI);

            });
            function myFunction() {
                document.getElementById("myForm").submit();
            }
        </script>

</body>
</html>