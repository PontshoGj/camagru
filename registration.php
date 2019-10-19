<?php
    include("usermanagement.php");
    $array = array();
    foreach($_POST as $key => $value)
        $array[$key] = $value;

    if ($array['name'] && $array['surname'] && $array['id'] && $array['number'])
    {
        $reg = new usermanagment();
        $reg->setdata($array['name'], $array['name'], $array['surname'], $array['number'], $array['address'], $array['id']);
        $reg->adduser();
        echo "User created\n";
    }
?>