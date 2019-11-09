<?php
    include("./connection.php");
    try
    {
        $conn->exec("
        CREATE TABLE auth (
          userid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          selec varchar(300) NOT NULL,
          token varchar(300) NOT NULL,
          date bigint(20) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        
        
        
        CREATE TABLE comments (
          num int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          userid int(11) NOT NULL,
          useridown int(11) NOT NULL,
          comment varchar(10000) NOT NULL,
          timess int(11) NOT NULL,
          imagenu int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        
        
        
        CREATE TABLE emailconfirm (
          userid int(11) NOT NULL,
          selec varchar(300) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        
        
        
        CREATE TABLE likes (
          num int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          userid int(11) NOT NULL,
          useridown int(11) NOT NULL,
          timess int(11) NOT NULL,
          imagenu int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        
        
        CREATE TABLE tempsave (
          images longblob NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        
        
        
        
        CREATE TABLE userimage (
          num int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          userid int(11) NOT NULL,
          images longblob NOT NULL,
          timess bigint(20) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    
        CREATE TABLE users (
          userid int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          username varchar(50) DEFAULT NULL,
          fullname varchar(50) DEFAULT NULL,
          email varchar(50) DEFAULT NULL,
          passwd varchar(300) DEFAULT NULL,
          OK tinyint(4) NOT NULL DEFAULT '0',
          notif tinyint(4) NOT NULL DEFAULT '1'
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        echo "aaaaaa";
        $conn = NULL;
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }    
    $conn = NULL;
?>