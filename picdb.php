<?php

class picdb{
    private $co;
    public function __construct()
    {
        include('./connection.php');
        $this->co = $conn;
    }

    public function tempsave($image)
    {
        try{
            $sql = 'INSERT INTO tempsave (images) VALUES (:images)';
            $aa = $this->co->prepare($sql);
            $aa->bindParam(':images', $image, PDO::PARAM_LOB);
            $aa->execute();
        }catch (PDOException $e)
        {
            /*echo $sql . "<br>" . */$e->getMessage() . "\n";
        }
    }

    public function getsave()
    {
        try{
            $sql = 'SELECT * FROM tempsave';
            $stmt = $this->co->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }catch (PDOException $e)
        {
            /*echo "Selection failed: " . */$e->getMessage();
        }
    }
    public function getall()
    {
        try{
            $sql = 'SELECT * FROM userimage ORDER BY timess dESC';
            $stmt = $this->co->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }catch (PDOException $e)
        {
            /*echo "Selection failed: " . */$e->getMessage();
        }
    }
    public function getalluser($userid)
    {
        try{
            $sql = 'SELECT * FROM userimage WHERE userid = :userid ORDER BY timess dESC';
            $stmt = $this->co->prepare($sql);
            $stmt->bindParam(':userid', $userid);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }catch (PDOException $e)
        {
            /*echo "Selection failed: " . */$e->getMessage();
        }
    }

    public function deleteimg($num, $userid){
        try{
            $sql = 'DELETE FROM userimage WHERE num = :num && userid = :userid';
            $aa = $this->co->prepare($sql);
            $aa->bindParam(':userid', $userid);
            $aa->bindParam(':num', $num);
            $aa->execute();
            $sql = 'DELETE FROM comments WHERE imagenu = :num && useridown = :userid';
            $aa = $this->co->prepare($sql);
            $aa->bindParam(':num', $num);
            $aa->bindParam(':userid', $userid);
            $aa->execute();
            $sql = 'DELETE FROM likes WHERE imagenu = :num && useridown = :userid';
            $aa = $this->co->prepare($sql);
            $aa->bindParam(':num', $num);
            $aa->bindParam(':userid', $userid);
            $aa->execute();
        }catch (PDOException $e)
        {
            /*echo $sql . "<br>" . */$e->getMessage();
        }
    }
    public function __distruct()
    {
        $conn = NULL;
    }
}
?>