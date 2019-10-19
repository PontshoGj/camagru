<?php
    //include(".create_table.php");
    //include(".connection.php");
    $servername = "localhost";
    $username = "root";
    $password = "123456";

    $conn = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=onlinestore", $username, $password);
         //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    /* function to add users to the database */
     function adduser($username, $firstname, $lastname, $phonenum, $email, $dateofbirth)
     { 
        $servername = "localhost";
        $username = "root";
        $password = "123456";
    
        $conn = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=onlinestore", $username, $password);
             //set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }  
         try{
             $sql = 'INSERT INTO users (username, firstname, lastname, phonenum, email, dateofbirth)
                     VALUES ( :username, :firstname, :lastname, :phonenum, :email, :dateofbirth)';
            //  $conn = retconn();
             $aa = $conn->prepare($sql);
             echo "dddddddd";

             $aa->bindParam('username', $username);
             $aa->bindParam('firstname', $firstname);
             $aa->bindParam('lastname', $lastname);
             $aa->bindParam('phonenum', $phonenum);
             $aa->bindParam('email', $email);
             $aa->bindParam('dateofbirth', $dateofbirth);
             $aa->execute();
             echo "Record created successfully\n";
         }catch (PDOException $e)
         {
             echo $sql . "<br>" . $e->getMessage() . "\n";
         }
         $conn = NULL;
     }

     /* function to delete of remove user from the database /*/  
     function deluser($userid)
     {   
         try{
             $sql = 'DELETE FROM users WHERE userid=:userid';
             $conn = retconn();
             $aa = $conn->prepare($sql);
             $aa->bindParam(':userid', $userid);
             $aa->execute();
             echo "Record deleted successfully\n";
         }catch (PDOException $e)
         {
             echo $sql . "<br>" . $e->getMessage();
         }
         $conn = NULL;
     }

     /* function to update user information in the database /*/
     function moduser($username, $firstname, $lastname, $phonenum, $email, $dateofbirth, $userid)
     {   
         try{
             $sql = 'UPDATET users 
                     SET username = :username
                     SET firstname = :firstname
                     SET lastname = :lastname
                     SET phonenum = :phonenum
                     SET email = :email
                     SET dateofbirth = :dateofbirth
                     WHERE userid = :userid';
             $conn = retconn();
             $aa = $conn->prepare($sql);
             $aa->bindParam(':username', $username);
             $aa->bindParam(':firstname', $firstname);
             $aa->bindParam(':lastname', $lastname);
             $aa->bindParam(':phonenum', $phonenum);
             $aa->bindParam(':email', $email);
             $aa->bindParam(':dateofbirth', $dateofbirth);
             $aa->bindParam(':userid', $userid);
             $aa->execute();
             echo "Record updated successfully\n";
         }catch (PDOException $e)
         {
             echo $sql . "<br>" . $e->getMessage();
         }
         $conn = NULL;
     }

     /* select all data for user from the database /*/
     function selectuser($userid)
     {   
         try{
             $sql = 'SELECT * FROM users
                     WHERE userid = :usserid';
             $conn = retconn();
             $aa = $conn->prepare($sql);
             $aa->bindParam(':userid', $userid);
             $aa->execute();
             echo "Record selected successfully\n";
             return $aa;
         }catch (PDOException $e)
         {
             echo $sql . "<br>" . $e->getMessage();
         }
         $conn = NULL;
         return 0;
     }
?>