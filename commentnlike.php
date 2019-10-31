<?php
class commentnlike{
    private $conns;
    public function __construct()
    {
        include('./connection.php');
        $this->conns = $conn;
    }

    public function addcomment($comment, $useridown, $userid)
    {
        try{
            $sql = 'INSERT INTO comments (userid, useridown, comment, timess)
                    VALUES ( :userid, :useridown, :comment, :timess)';
            $aa = $this->conns->prepare($sql);
            $aa->bindParam(':userid', $userid);
            $aa->bindParam(':useridown', $useridown);
            $aa->bindParam(':comment', $comment);
            $aa->bindParam(':timess', date("U"));
            $aa->execute();
        }catch (PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage() . "\n";
        }
    }

    public function addlike($useridown, $userid)
    {
        try{
            $sql = 'INSERT INTO likes (userid, useridown, timess)
                    VALUES ( :userid, :useridown, :timess)';
            $aa = $this->conns->prepare($sql);
            $aa->bindParam(':userid', $userid);
            $aa->bindParam(':useridown', $useridown);
            $aa->bindParam(':timess', date("U"));
            $aa->execute();
        }catch (PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage() . "\n";
        }
    }
}
?>