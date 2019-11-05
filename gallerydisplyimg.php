<?php
            // include_once('./picdb.php');
            // $arr = new picdb();
            // $display = $arr->getalluser($_SESSION["username"]);
            // $i = 0;
            // while($i < count($display))
            // {
            //     echo '<div><img src="'.$display[$i]['images'].'" style="width: 450px; hight: 450px; margin-left: 450px;" ><div>';
            //     $i++;
            // } 

        include_once('./picdb.php');
        $arr = new picdb();
        $display = $arr->getalluser($_SESSION["username"]);
        if (strcmp($_POST['submit'],'next') == 0)
            $i = ($_POST['next']) ? $_POST['next'] : 0;
        elseif (strcmp($_POST['submit'],'back') == 0 && $_POST['back'] > 10)
            $i = ($_POST['back']) ? $_POST['back'] - 10 : 0;
        else
            $i = 0;
        $jj = 0;
        while($i < count($display) && $jj < 5)
        {
            echo '<div style="margin-left:5vw; margin-right: 1vw; float: left; margin-bottom: 30px;"><div><img src="'.$display[$i]['images'].'" width="250px" height="250px"></div></div>';            
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
?>