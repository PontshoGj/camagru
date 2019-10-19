<?php
    include("./connection.php");
    try
    {
        $sql = "CREATE TABLE IF NOT EXISTS users(
            userid  INT(10) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50),
            firstname VARCHAR(50),
            lastname VARCHAR(50),
            phonenum INT(10),
            email VARCHAR(50),
            dateofbirth VARCHAR(50));";
        $conn->exec($sql);
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = NULL;
?>