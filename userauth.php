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
        public function checklogin($username, $passwd)
        {
            $count;
            $val;
            /* cehcking if the user enter a username and password */
            try{
                $sql = 'SELECT * FROM users WHERE username = :uname && passwd = :passwd';
                $exe = $conns->prepare($sql);
                $exe->bindParam(':uname', $username);
                $exe->bindParam(':passwd', $passwd);
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
                    $exe->bindParam(':passwd', $passwd);
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
            $selec = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = "www.localhost/create_new_password.php?selec=".$selec."&validator=".bin2hex($token);
            $exp = date("U") + 1800;
            $user = $_POST['email'];
            $to = $username;
            $subject = "Reset your passord for camagru";

            $message =  "We revieved a password reset request. The link to reset your password";
            $message .= '<a href="'. $url . '">'. $url.'</a>';

            $headers = "From: camagru <camagru@gmail.com>\r\n";
            $headers .= "Reply-To: camagru@gmail.com\r\n";
            $headers .= "Content-type: text/html\r\n";

            mail($to,$subject, $message,$headers);

            header("location: login.html");

        }


        /* disconnecting from the database */
        function __destruct(){
            $conns = NULL;
        }
    }
?>