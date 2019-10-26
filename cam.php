<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="video-wrap">
        <video id="video" playsinline autoplay></video>
    </div>

    <div class="controller">
        <button id="snap">Capture</button>
    </div>

    <canvas id="canvas" width="640" height="480"></canvas>

    <script>
        'use strict';
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const snap = document.getElementById('snap');
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
            document.getElementById("video").style.display = "none";
            document.getElementById("snap").style.display = "none";
            let stream2 = video.srcObject;
            let tracks = stream2.getTracks();
            tracks.forEach(function(track){
                track.stop();
            }); 
        });
        
    </script>
</body>
</html>