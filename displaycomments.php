<?php
    session_start();

    $retrive = array();
    $not_val = "";
    foreach($_POST as $key => $value)
        $retrive[$key] = $value;
    if (isset($_SESSION["username"])  && isset($retrive['submit']))
    {
        if(isset($retrive['comment']) && isset($retrive['userid']) && isset($_SESSION['username']) && isset($retrive['imagenu']))
        {
            include_once('commentnlike.php');
            $ad = new commentnlike();
            $ad->addcomment($retrive['comment'], $_SESSION['username'], $retrive['userid'], $retrive['imagenu']);
            $ad->emailcomment($_SESSION['username'], 'comment');
            unset($ad);
        }
    }elseif (isset($_SESSION["username"]) && isset($retrive['like']))
    {
        if($retrive['like'] && $_SESSION['username'])
        {
            include_once('commentnlike.php');
            $ad = new commentnlike();
            $ad->addlike($_SESSION['username'], $retrive['like'], $retrive['imagenu']);
            $ad->emailcomment($_SESSION['username'], 'like');
            unset($ad);
        }
    }
?>