<?php
    $retrive = array();
    foreach($_POST as $key => $value)
        $retrive[$key] = $value;
    if ($retrive["image"]) {
        $reimage = explode(",", $retrive['image']);
        $encodedData = str_replace(' ','+',$reimage[1]);
        $decodedData = base64_decode($encodedData);
        $fp = fopen("canvas.png", 'wb');
        fwrite($fp, $decodedData);
        fclose();
        include_once('./picdb.php');
        $as = new picdb();
        $as->tempsave($retrive['image']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 
</head>
<body>
    <form actio="cam.php" method="post">

        <div class="video-wrap">
            <video id="video" playsinline autoplay></video>
        </div>

            <input type="hidden" value="" id="image" name="image">
        <div class="controller">
            <button id="snap" type="submit">Capture</button>
            ballon<input type="radio" id="rad" name="ballon" value="ballon">
            butterfly<input type="radio" id="rad" name="butterfly" value="butterfly">
            vine<input type="radio" id="rad" name="vine" value="vine">
            decor<input type="radio" id="rad" name="decor" palceholder="decor">
        </div>

        <canvas id="canvas" width="640" height="480"></canvas>
    </form>
    <div>
        <?php
            include_once('./picdb.php');
            $arr = new picdb();
            $display = $arr->getsave();
            print_r($display);
            // foreach($display as $key=>$value) 
            //     echo $value; 
        ?>
    </div>

    <div>
        <button id="save" style="display: none;">Save</button>
    </div>
    <!-- <div id="imagediv">
         <img src="" id="saveimage" style="float: left; border: 1px solid black; margin-left: 10px;">
    </div> -->
    <script>
            'use strict';
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const snap = document.getElementById('snap');
            const image = document.getElementById("image");
            // const imagesave = document.getElementById("saveimage");
            const errorMsgElement = document.getElementById('span#ErrorMsg');
            const constraints = {
                audio: true,
                video:{
                    width: 1280, height: 720
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
                context.drawImage(video, 0, 0, 640, 480);
                // document.getElementById("video").style.display = "none";
                // document.getElementById("snap").style.display = "none";
                // let stream2 = video.srcObject;
                // let tracks = stream2.getTracks();
                // tracks.forEach(function(track){
                //     track.stop();
                // });
                const dataURI = canvas.toDataURL();
                //imagesave.src = dataURI;
                image.setAttribute('value', dataURI);
                // if (!document.getElementById('imagediv'))
                // {
                //     var imagedv = document.createElement("div");
                //     // imagedv.setAttribute('id', 'imagediv');

                // }else{
                //     const imagedv = document.getElementById("imagediv");
                // }

                //     const dataURI = canvas.toDataURL();
                //     imagesave.src = dataURI;
            });

            // const btndisplay = document.querySelector("#save");
            // const imagesave = document.querySelector("#saveimage");

            // btndisplay.addEventListener('click', function(){
            //     const dataURI = canvas.toDataURI();
            //     imagesave.src = dataURI;
            // });
            
        </script>

</body>
</html>