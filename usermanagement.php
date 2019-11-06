<?php
    //include('./create_table.php');
    require_once("./userauth.php");
    class usermanagment{
        private $conns;
        private $uname;
        private $fullname;
        private $emails;
        private $passwd;
        
        public function __construct()
        {
            include('./connection.php');
            $this->conns = $conn;
        }
        
        public function setdata($uname, $fullname, $email, $passwd)
        {
            $this->uname = $uname;
            $this->firstname = $fullname;
            $this->emails = $email;
            $this->passwd = $passwd;
        }

        public function adduser()
        {
            try{
                $sql = 'INSERT INTO users (username, fullname, email, passwd)
                        VALUES ( :username, :fullname, :email, :passwd)';
                $aa = $this->conns->prepare($sql);
    
                $aa->bindParam(':username', $this->uname);
                $aa->bindParam(':fullname', $this->fullname);
                $aa->bindParam(':email', $this->emails);
                $aa->bindParam(':passwd', $this->passwd);
                $aa->execute();
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "\n";
            }
            $confirm = new userauth();
            $confirm->emailconfo($this->emails);
        }
        
        /* function to delete of remove user from the database /*/  
        public function deluser($userid)
        {   
            try{
                $sql = 'DELETE FROM users WHERE userid=:userid';
                $aa = $this->conns->prepare($sql);
                $aa->bindParam(':userid', $userid);
                $aa->execute();
                // echo "Record deleted successfully\n";
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        
        /* function to update user information in the database */
        public function moduser($userids, $emails, $username)
        {
            try{
                $sql = 'UPDATE users 
                        SET username = :username, email = :email
                        WHERE userid = :userid';
                $aa = $this->conns->prepare($sql);
                $aa->bindParam(':username', $username);
                $aa->bindParam(':email', $emails);
                $aa->bindParam(':userid', $userids);
                $aa->execute();
                // echo "Record updated successfully\n";
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        public function moduserchecked($userids, $emails, $username)
        {
            try{
                $sql = 'UPDATE users 
                        SET username = :username, email = :email, notif = 1
                        WHERE userid = :userid';
                $aa = $this->conns->prepare($sql);
                $aa->bindParam(':username', $username);
                $aa->bindParam(':email', $emails);
                $aa->bindParam(':userid', $userids);
                $aa->execute();
                // echo "Record updated successfully\n";
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        public function moduserch($userids, $emails, $username)
        {
            try{
                $sql = 'UPDATE users 
                        SET username = :username, email = :email, notif = 0
                        WHERE userid = :userid';
                $aa = $this->conns->prepare($sql);
                $aa->bindParam(':username', $username);
                $aa->bindParam(':email', $emails);
                $aa->bindParam(':userid', $userids);
                $aa->execute();
                // echo "Record updated successfully\n";
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        /* select all data for user from the database */
        public function selectuser($userids)
        {   
            try{
                $sql = 'SELECT * FROM users
                        WHERE userid = :userid';
                $aa = $this->conns->prepare($sql);
                $aa->bindParam(':userid', $userids);
                $aa->execute();
                // echo "Record selected successfully\n";
                $aa->setFetchMode(PDO::FETCH_ASSOC);
                return ($aa->fetchAll());
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        public function __destruct(){
            $conns = NULL;
        }
    }
?>