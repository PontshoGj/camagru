<?php
            include_once('./picdb.php');
            include_once('commentnlike.php');
            $hold = new commentnlike();
            $arr = new picdb();
            $display = $arr->getall();
            if (strcmp($_POST['submit'],'next') == 0)
                $i = ($_POST['next']) ? $_POST['next'] : 0;
            elseif (strcmp($_POST['submit'],'back') == 0 && $_POST['back'] > 10)
                $i = ($_POST['back']) ? $_POST['back'] - 10 : 0;
            else
                $i = 0;
            $jj = 0;
            while($i < count($display) && $jj < 5)
            {
                echo '<div style="margin-left:5vw; margin-right: 1vw; float: left; margin-bottom: 30px;"><div><img src="'.$display[$i]['images'].'" width="250px" height="250px"></div>';
                if($_SESSION['username'])
                {
                    $lik = count($hold->getlikes($display[$i]['num']));

                    $holds = $hold->getcomments($display[$i]['num']);
                    echo '<div id="'.$display[$i]['timess'].'"><button id="'.$display[$i]['timess'].'" onclick="displays('.$display[$i]['num'].','.$display[$i]['timess'].' )">comment '.count($holds).'</button>';
                    echo '<form action="publicgallery.php" method="post"><button id="'.$display[$i]['timess'].'" type="submit" name="like" value="'.$display[$i]['userid'].'">like '.$lik.'</button>';
                    echo '<input type="hidden" name="imagenu" value="'.$display[$i]['num'].'"></form></div><br/>';

                    echo '<div id="'.$display[$i]['num'].'" style="display:none;">';
                    $j = 0;
                    while($j < count($holds))
                    {
                       echo '<textarea rows="4" cols="20" disabled>'.$holds[$j]['comment'].'</textarea><br/>';
                       $j++;
                    }                   
                    echo '<form action="publicgallery.php" method="post"><textarea name="comment"  id="'.$display[$i]['num'].'" rows="4" cols="20"></textarea>';
                    echo '<input type="hidden" name="userid" value="'.$display[$i]['userid'].'">';
                    echo '<input type="hidden" name="imagenu" value="'.$display[$i]['num'].'"><br/>';
                    echo '<button type="submit" value="comment" id="'.$display[$i]['num'].'" name="submit">comment</button></form></div><br/>';
                    unset($holds);
                }
                echo '</div>';
                $i++;
                $jj++;
            }
            echo '<div class="bl">';
            if (count($display) > $i)
            {
                echo '<div style="float: left;"><form method="post"><input type="hidden" name="next" value="'.$i.'"><button type="submit" value="next"  name="submit">next</button></form></div>';
                if ($i > 5)
                    echo '<div style="float: left;"><form method="post"><input type="hidden" name="back" value="'.$i.'"><button type="submit" value="back" name="submit">back</button></form></div>';

            }else{
                echo '<div style="float: left;"><form method="post"><input type="hidden" name="back" value="'.$i.'"><button type="submit" value="back" name="submit">back</button></form></div>';
            }
            echo '</div>';
            unset($hold); 
?>