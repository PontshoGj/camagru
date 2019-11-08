<?php
    include("./connection.php");
    try
    {
        $sql = "CREATE TABLE auth (
            userid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            selec varchar(300) NOT NULL,
            token varchar(300) NOT NULL,
            date bigint(20) NOT NULL
          );";
        $conn->exec($sql);
        echo 'AUTH';
        $sql = "CREATE TABLE comments (
            num int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            userid int(11) NOT NULL,
            useridown int(11) NOT NULL,
            comment varchar(10000) NOT NULL,
            timess tinyint(4) NOT NULL
          );";
        $conn->exec($sql);
        echo "COMMENTS\n";
        $sql = "CREATE TABLE emailconfirm (
            userid int(11) NOT NULL,
            selec varchar(300) NOT NULL
          );";
        $conn->exec($sql);
        echo "EMAILCONFIRM\n";
        $sql = "CREATE TABLE likes (
            num int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            userid int(11) NOT NULL,
            useridown int(11) NOT NULL,
            timess tinyint(4) NOT NULL
          );";
        $conn->exec($sql);
        echo "LIKES\n";
        $sql = "CREATE TABLE tempsave (
            images longblob NOT NULL
          );";
        $conn->exec($sql);
        echo "TMEPSAVE\n";
        $sql = "CREATE TABLE userimage (
            num int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            userid int(11) NOT NULL,
            images longblob NOT NULL,
            timess bigint(20) NOT NULL
          );";
        $conn->exec($sql);
        echo "USERIMAGE\n";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }    
    $conn = NULL;
?>