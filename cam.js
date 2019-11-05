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