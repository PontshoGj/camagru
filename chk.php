<?php
    $rqs = new usermanagment();
    $hols = $rq->selectuser($_SESSION['username']);
    if ($hols[0]['notif'])
        echo 'checked';
?>