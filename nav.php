<?php
    echo '<div class="header">';
        echo '<ul>';

            if (isset($_SESSION["username"]))
            {
                echo '<li><a href="gallery.php">Profile</a></li>';
                echo '<li><a href="cam.php">cam</a></li>';
                echo '<li><a href="upload.php">upload</a></li>';
                echo '<li><a href="edituser.php">edituser</a></li>';
                echo '<li><a href="publicgallery.php">public</a>';
                echo '<li><a href="logout.php">logout</a></li>';
            }else
            {
                echo '<li><a href="login.php">login</a></li> ';
                echo '<li><a href="registration.php">Register</a></li>';
            }
        echo '</ul>';
    echo '</div>';
?>