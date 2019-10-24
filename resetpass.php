<?php
   include("./userauth.php");
   $retrive = array();
   foreach($_POST as $key => $value)
      $retrive[$key] = $value;
    echo $retrive['userid'];

//    if ($retrive["password"] && $retrive["re-password"]) {
//       $aa = new userauth();
//       if ($aa->updatepass($retrive['password'], $retrive['submit'], $retrive['re-password']))
//       {
//           //echo $retrive['submit'];
            
//           header('location: login.php');
//       }
//    }
?>