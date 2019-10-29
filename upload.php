<?php
    if (isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileEror = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileAxtualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileAxtualExt, $allowed))
        {
            if ($fileEror === 0)
            {
                if ($fileSize < 1000000)
                {
                    $fileNameNew = uniqid('', true).".".$fileAxtualExt;
                    $filedest = "./".$fileNameNew;
                    move_uploaded_file($fileTmpName, $filedest);
                }else{
                    echo "file too big";
                }
            }else{
                echo "there was error with upload";
            }
        }else{
            echo "can not upload file";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
</head>
<body>
    <form action="./upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
    </form>
     <a href="logout.php">logout</a>
</body>
</html>