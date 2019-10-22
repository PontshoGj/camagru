<?php
    session_start();
    include("auth.php");
    $array = array();
    foreach($_POST as $key => $value)
        $array[$key] = $value;
    if (auth($array['login'], $array['passwd']))
    {
        $_SESSION["login"] = $array["login"];
        $_SESSION["passwd"] = $array['passwd'];
    }else
        header('location: ./login.php')
?>