<?php

    class userauth{
        private $conns;

        /* connecting to the database */
        function __construct()
        {
            include('./connection.php');
            $this->conns = $conn;
        }
        /* check if the user provided the correct log in information */
        public function checklogin($username, $password)
        {
            $count;
            $val;
            /* cehcking if the user enter a username and password */
            try{
                $sql = 'SELECT * FROM users WHERE username = :uname && passwd = :passwd';
                $exe = $conns->prepare($sql);
                $exe->bindParam(':uname', $username);
                $exe->bindParam(':passwd', $password);
                $exe->execute();
                $val->setFetchMode(PDO::FETCH_ASSOC);
            }catch (PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            /* checking if the user entered username and password is correct else check if the user entered an email not username*/
            $count = count($val);
            if ($count > 0)
                return (1);
            else
            {
                /* check  if the user entered email is correct if the username was wrong*/
                try{
                    $sql = 'SELECT * FROM users WHERE email = :uname && passwd = :passwd';
                    $exe = $conns->prepare($sql);
                    $exe->bindParam(':uname', $username);
                    $exe->bindParam(':passwd', $password);
                    $exe->execute();
                    $val->setFetchMode(PDO::FETCH_ASSOC);
                }catch (PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
                $count = count($val);
                if ($count > 0)
                    return (1);
                else
                    return (0);
            }
        }
        /* send email to the user if the $username||$email provided is correct */
        public function passwordreset($username)
        {

        }
        /* disconnecting from the database */
        function __destruct(){
            $conns = NULL;
        }
    }
?>