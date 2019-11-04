<?php
        session_start();
        include_once('./userauth.php');
        $retrive = array();
        $not_val = "";
        foreach($_POST as $key => $value)
            $retrive[$key] = $value;
        if ($retrive["username"] && $retrive["password"] && $retrive["submit"]) {
            $va = new userauth();
            echo $va->checklogin($retrive['username'], $retrive['password']);
            if ($va->checklogin($retrive['username'], $retrive['password'])){
                $val = $va->getuserid($retrive["username"]);
                $_SESSION['username'] = $val[0]['userid'];
                header("Location: publicgallery.php");
            }
            else{
                $not_val = "incorect username or password";
            }
        }
?>