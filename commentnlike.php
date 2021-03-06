<?php
class commentnlike{
    private $conns;
    public function __construct()
    {
        include('./connection.php');
        $this->conns = $conn;
    }

    public function addcomment($comment, $useridown, $userid, $imagenu)
    {
        try{
            $sql = 'INSERT INTO comments (userid, useridown, comment, timess, imagenu)
                    VALUES ( :userid, :useridown, :comment, :timess, :imagenu)';
            $aa = $this->conns->prepare($sql);
            $a = date("U");
            $aa->bindParam(':userid', $userid);
            $aa->bindParam(':useridown', $useridown);
            $aa->bindParam(':comment', $comment);
            $aa->bindParam(':timess', $a);
            $aa->bindParam(':imagenu', $imagenu);
            $aa->execute();
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function addlike($useridown, $userid, $imagenu)
    {
        try{
            $sql = 'INSERT INTO likes (userid, useridown, timess, imagenu)
                    VALUES ( :userid, :useridown, :timess, :imagenu)';
            $aa = $this->conns->prepare($sql);
            $a = date("U");
            $aa->bindParam(':userid', $userid);
            $aa->bindParam(':useridown', $useridown);
            $aa->bindParam(':timess', $a);
            $aa->bindParam(':imagenu', $imagenu);
            $aa->execute();
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function getcomments($imagenu)
    {
        try{
            $sql = 'SELECT * FROM comments WHERE imagenu = :imagenu';
            $exe = $this->conns->prepare($sql);
            $exe->bindParam(':imagenu', $imagenu);
            $exe->execute();
            $val = $exe->setFetchMode(PDO::FETCH_ASSOC);
            return ($exe->fetchAll());
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function getlikes($imagenu)
    {
        try{
            $sql = 'SELECT * FROM likes WHERE imagenu = :imagenu';
            $exe = $this->conns->prepare($sql);
            $exe->bindParam(':imagenu', $imagenu);
            $exe->execute();
            $val = $exe->setFetchMode(PDO::FETCH_ASSOC);
            return ($exe->fetchAll());
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function emailcomment($userid, $kind)
    {
        try{
            $sql = 'SELECT * FROM users WHERE userid = :userid && notif = 1';
            $exe = $this->conns->prepare($sql);
            $exe->bindParam(':userid', $userid);
            $exe->execute();
            $val = $exe->setFetchMode(PDO::FETCH_ASSOC);
            $user  = $exe->fetchAll();
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
        $to = $user[0]['email'];
        switch($kind)
        {
            case 'comment':
                $subject = "Someone commented on your image";
                $message =  "Someone commented on your image\n";
                break;
            case 'like':
                $subject = "Someone liked your image";
                $message =  "Someone liked your image\n";
                break;
        }
        $headers = "Content-type: text\r\n";
        mail($to,$subject, $message,$headers);
    }
    public function __destruct(){
        $this->conns = NULL;
    }
}
?>