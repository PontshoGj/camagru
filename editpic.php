<?php
  
        switch($retrive['rad']){
            case "bat":
                
                $image1 = $fileNameNew;
                $image2 = 'bat.png';

                list($width, $height) = getimagesize($image2);

                $image1 = imagecreatefromstring(file_get_contents($image1));
                $image2 = imagecreatefromstring(file_get_contents($image2));

                imagecopymerge($image1, $image2, 0, 100, 0, 0, $width, $height, 100);
                imagepng($image1, 'merge.png');

                $data = file_get_contents('merge.png');
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                include_once('./picdb.php');
                $as = new picdb();
                $as->tempsave($base64);             
                break;
            case "glass":
                $image1 = $fileNameNew;
                $image2 = 'glass2.png';

                list($width, $height) = getimagesize($image2);

                $image1 = imagecreatefromstring(file_get_contents($image1));
                $image2 = imagecreatefromstring(file_get_contents($image2));

                imagecopymerge($image1, $image2, 0, 100, 0, 0, $width, $height, 100);
                imagepng($image1, 'merge.png');

                $data = file_get_contents('merge.png');
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                include_once('./picdb.php');
                $as = new picdb();
                $as->tempsave($base64);                 
                break;
            case "tree":
                $image1 = $fileNameNew;
                $image2 = 'tree.png';

                list($width, $height) = getimagesize($image2);

                $image1 = imagecreatefromstring(file_get_contents($image1));
                $image2 = imagecreatefromstring(file_get_contents($image2));

                imagecopymerge($image1, $image2, 0, 100, 0, 0, $width, $height, 100);
                imagepng($image1, 'merge.png');

                $data = file_get_contents('merge.png');
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                include_once('./picdb.php');
                $as = new picdb();
                $as->tempsave($base64);                 
                break;
            default:
                include_once('./picdb.php');
                $as = new picdb();
                $as->tempsave($base64);
        }
?>