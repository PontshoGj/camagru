<?php
        session_start();
        include_once('./userauth.php');
        $retrive = array();
        $not_val = "";
        foreach($_POST as $key => $value)
            $retrive[$key] = $value;
        if (isset($_POST))
        {
            if ($retrive["username"] && $retrive["password"] && $retrive["submit"]) {
                $va = new userauth();
                if ($va->checklogin($retrive['username'], $retrive['password'])){
                    $val = $va->getuserid3($retrive["username"]);
                    $_SESSION['username'] = $val[0]['userid'];
                    header("Location: publicgallery.php");
                }
                else{
                    header("location: login.php?not_val=incorrect+username+or+password");
                }
            }
        }
?>