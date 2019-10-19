<?php
    include('./create_table.php');
    class usermanagment{
        private $conn;
        private $uname;
        private $firstname;
        private $lastname;
        private $phonenum;
        private $emails;
        private $dateofbirth;
        
        function __construct()
        {
            $servername = "localhost";
            $username = "root";
            $password = "123456";
            try {
                $connection = new PDO("mysql:host=$servername;dbname=onlinestore", $username, $password);
                //set the PDO error mode to exception
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn = $connection;
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        
        function setdata($uname, $firstname, $lastname, $phonenum, $email, $dateofbirth)
        {
            $this->uname = $uname;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->phonenum = $phonenum;
            $this->emails = $email;
            $this->dateofbirth = $dateofbirth;
        }

        function adduser()
        {
            try{
                $sql = 'INSERT INTO users (username, firstname, lastname, phonenum, email, dateofbirth)
                        VALUES ( :username, :firstname, :lastname, :phonenum, :email, :dateofbirth)';
                $aa = $this->conn->prepare($sql);
    
                $aa->bindParam('username', $this->uname);
                $aa->bindParam('firstname', $this->firstname);
                $aa->bindParam('lastname', $this->lastname);
                $aa->bindParam('phonenum', $this->phonenum);
                $aa->bindParam('email', $this->emails);
                $aa->bindParam('dateofbirth', $this->dateofbirth);
                $aa->execute();
                echo "Record created successfully\n";
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "\n";
            }
        }
        
        /* function to delete of remove user from the database /*/  
        function deluser($userid)
        {   
            try{
                $sql = 'DELETE FROM users WHERE userid=:userid';
                $aa = $this->conn->prepare($sql);
                $aa->bindParam(':userid', $userid);
                $aa->execute();
                echo "Record deleted successfully\n";
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = NULL;
        }
        
        /* function to update user information in the database */
        function moduser($userid)
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
                $aa->bindParam(':username', $this->uname);
                $aa->bindParam(':firstname', $this->firstname);
                $aa->bindParam(':lastname', $this->lastname);
                $aa->bindParam(':phonenum', $this->phonenum);
                $aa->bindParam(':email', $this->emails);
                $aa->bindParam(':dateofbirth', $this->dateofbirth);
                $aa->bindParam(':userid', $this->userid);
                $aa->execute();
                echo "Record updated successfully\n";
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        /* select all data for user from the database /*/
        function selectuser($userid)
        {   
            try{
                $sql = 'SELECT * FROM users
                        WHERE userid = :usserid';
                $aa = $this->conn->prepare($sql);
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

        function __destruct(){
            $conn = NULL;
        }
}
?>