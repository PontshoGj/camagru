<?php

$selec = bin2hex(random_bytes(8));
$token = random_bytes(32);

$url = "http://localhost:8080/camagru/create_new_password.php?selec=".$selec."&validator=".bin2hex($token);
$exp = date("U") + 1800;
$user = $_POST['email'];
$to = "pontshomogwere@gmail.com";
$subject = "Reset your passord for camagru";

$message =  "We revieved a password reset request. The link to reset your password";
$message .= '<a href="'. $url . '">'. $url.'</a>';

//$headers = "From: camagru <camagru@gmail.com>\r\n";
//$headers .= "Reply-To: camagru@gmail.com\r\n";
$headers .= "Content-type: text/html\r\n";

if (mail($to,$subject, $message,$headers))
    header("location: login.html");

?>