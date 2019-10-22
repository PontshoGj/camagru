<?php
    include("usermanagement.php");
    $array = array();
    foreach($_POST as $key => $value)
        $array[$key] = $value;

    if ($array['username'] && $array['name'] && $array['email'] && $array['password'])
    {
        $reg = new usermanagment();
        $reg->setdata($array['username'], $array['name'], $array['email'], $array['password']);
        $reg->adduser();
        echo "User created\n";
    }
?>