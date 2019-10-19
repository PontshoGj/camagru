<?php
    session_start();
    include("auth.php");
    $array = array();
    foreach($_POST as $key => $value)
        $array[$key] = $value;
    if (auth($array['login'], $array['passwd']))
    {
        $_SESSION["login"] = $array["login"];
        $_SESSION["passwd"] = $array['passwd'];
    }else
        header('location: ./login.php')
?>
<html>
    <body>
        <form action="./login.php" method="POST">
            Usename:<input type="text" name ="login"/>
            <br />
            Password: <input type="text" name="passwd"/>
            <input type="submit" name="submit" value="OK">
        </form>
        <a href="./registration.html">create account</a><a href="./modif.html">Forgort Password</a>
    </body>
</html>