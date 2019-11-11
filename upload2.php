<?php
include_once('./sessionmanagement.php');
    $retrive = array();
    $display = "";
    $displayhd = "";
    foreach($_POST as $key => $value)
        $retrive[$key] = $value;
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
                    $fileNameNew = "merge.".$fileAxtualExt;
                    $filedest = "./".$fileNameNew;
                    move_uploaded_file($fileTmpName, $filedest);
                    $display = "hidden";
                    $displayhd = "hid";
                    $data = file_get_contents('merge.'.$fileAxtualExt);
                    $type = "";
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    // echo $base64;
                    // header("Location: editpic.php");

                }
            }
        }
    }
    if (isset($_POST['merge'])){
        include("editpic.php");
    }
    ?>