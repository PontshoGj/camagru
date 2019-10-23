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

<!DOCKTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="./upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">Upload</button>
        </form>
    </body>
</html>