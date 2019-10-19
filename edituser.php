<?php
    include('./usermanagement.php');

    $array = array();
    foreach($_POST as $key => $value)
        $array[$key] = $value;
    if ($array['name'] && $array['surname'] && $array['id'] && $array['number'] && $array['submit'] == 'OK')
    {
        $reg = new usermanagment();
        $reg->setdata($array['name'], $array['name'], $array['surname'], $array['number'], $array['address'], $array['id']);
        $reg->moduser($userid);
        echo "User mod\n";
    }
    else
    {
        if ($array['userid'])
        {
            $reg = new usermanagment();
            $array =    $reg->selectuser($array['userid']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <div>
        <form action="registration.php" method="POST">
            <p>Name:       <input type="text" name="name" value="<?php echo $array['name']; ?>"><br />
            <p>Surname:    <input type="text" name="surname" value="<?php echo $array['surname']; ?>"><br>
            <p>id:         <input type="text" name="id" value="<?php echo $array['id']; ?>"><br>
            <p>Number:     <input type="text" name="number" value="<?php echo $array['number']; ?>"><br>
            Address:    <input type="text" name="address" id="" value="<?php echo $array['address']; ?>"><br>
                        <input type="text" name="" id=""><br>
                        <input type="text" name="" id=""><br>
                        <input type="text" name="" id=""><br>
                        <input type="submit" name="submit" id="" value="OK">
        </form>
    </div>
</body>
</html>