<?php
    session_start();

    $retrive = array();
    $not_val = "";
    foreach($_POST as $key => $value)
        $retrive[$key] = $value;
    if ($_SESSION["username"]  && $retrive['submit'])
    {
        if($retrive['comment'] && $retrive['userid'] && $_SESSION['username'] && $retrive['imagenu'])
        {
            include_once('commentnlike.php');
            $ad = new commentnlike();
            $ad->addcomment($retrive['comment'], $_SESSION['username'], $retrive['userid'], $retrive['imagenu']);
            $ad->emailcomment($_SESSION['username'], 'comment');
            unset($ad);
        }
    }elseif ($_SESSION["username"] && $retrive['like'])
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