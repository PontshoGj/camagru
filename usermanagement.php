<?php
    include('./create_table.php');
    class usermanagment{
        private $conns;
        private $uname;
        private $firstname;
        private $lastname;
        private $phonenum;
        private $emails;
        private $dateofbirth;
        
        function __construct()
        {
            include('./connection.php');
            $this->conns = $conn;
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
                $aa = $this->conns->prepare($sql);
    
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
                $aa = $this->conns->prepare($sql);
                $aa->bindParam(':userid', $userid);
                $aa->execute();
                echo "Record deleted successfully\n";
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
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
                $aa = $conns->prepare($sql);
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

        /* select all data for user from the database */
        function selectuser($userid)
        {   
            try{
                $sql = 'SELECT * FROM users
                        WHERE userid = :usserid';
                $aa = $this->conns->prepare($sql);
                $aa->bindParam(':userid', $userid);
                $aa->execute();
                //echo "Record selected successfully\n";
                return ($aa->setFetchMode(PDO::FETCH_ASSOC));
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        function __destruct(){
            $conns = NULL;
        }
}
?>