<?php
    include_once('./sessionmanagement.php');
    include_once('./usermanagement.php');
    include_once('./userauth.php');

    $array = array();
    $a = "";
    $ba = "";
    foreach($_POST as $key => $value)
        $array[$key] = $value;
    if ($array['password'] && $array['chkpassword'])
    {
        $aa = new userauth();
        if ($aa->updatepass($array['password'], $_SESSION['username'], $array['chkpassword']))
        { 
            $a = 'password updated';
        }else
        {
            $a = "password does not match";
        }
    }
    elseif ($array['email'] && $array['username'] && $array['submit'] == 'Update')
    {
        $reg = new usermanagment();
        if (isset($array['email_preference']))
            $reg->moduserchecked($_SESSION['username'], $array['email'], $array['username']);
        else
            $reg->moduserch($_SESSION['username'], $array['email'], $array['username'], '1');
        $ba = 'detials updated';
    }
?>