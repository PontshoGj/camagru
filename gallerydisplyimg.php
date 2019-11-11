<?php
        include_once('./picdb.php');
        $arr = new picdb();
        if (isset($_POST['submit'])){
        if (strcmp($_POST['submit'], 'delete') == 0){
            $arr->deleteimg($_POST['delete'], $_SESSION['username']);
            header('location: gallery.php');
        }
        }
        $i = 0;
        $jj = 0;
        $display = $arr->getalluser($_SESSION["username"]);
        if (count($display))
        {
            while($i < count($display))
            {
                echo '<div style="margin-left:5vw; margin-right: 1vw; float: left; margin-bottom: 30px;"><div><img src="'.$display[$i]['images'].'" width="200vw" height="200vh"></div></div>'; 
                echo '<div style="float: left;"><form id="myForm" action="gallery.php" method="post"><input type="hidden" name="delete" value="'.$display[$i]['num'].'"><button type="submit"  value="delete" name="submit">delete</button></form></div>';           
                $i++;
                $jj++;
                if ($jj == 5)
                    echo "<br/>";
            }
        }
?>