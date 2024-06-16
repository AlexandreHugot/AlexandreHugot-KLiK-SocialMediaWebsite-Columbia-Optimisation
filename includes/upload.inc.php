<?php

function resizeImage($source, $destination, $fileActualExt) {
    list($width, $height) = getimagesize($source);

    // Redimensionne si les dimensions sont supérieures à 200px
    while ($width > 200 || $height > 200) {
        $width /= 2;
        $height /= 2;
    }

    $newImage = imagecreatetruecolor($width, $height);

    switch ($fileActualExt) {
        case 'jpg':
        case 'jpeg':
            $sourceImage = imagecreatefromjpeg($source);
            break;
        case 'png':
            $sourceImage = imagecreatefrompng($source);
            imagepalettetotruecolor($sourceImage);
            imagealphablending($sourceImage, true);
            imagesavealpha($sourceImage, true);
            break;
        case 'gif':
            $sourceImage = imagecreatefromgif($source);
            break;
        default:
            $sourceImage = null;
            break;
    }

    if ($sourceImage !== null) {
        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $width, $height, imagesx($sourceImage), imagesy($sourceImage));

        // Enregistrer l'image redimensionnée
        switch ($fileActualExt) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($newImage, $destination, 100);
                break;
            case 'png':
                imagepng($newImage, $destination, 0);
                break;
            case 'gif':
                imagegif($newImage, $destination);
                break;
        }

        imagedestroy($sourceImage);
        imagedestroy($newImage);
    }
}

$file = $_FILES['dp'];

// Use new image name if a new image was uploaded
if (!empty($_FILES['dp']['name']))
{
    $fileName = $_FILES['dp']['name'];
    $fileTmpName = $_FILES['dp']['tmp_name'];
    $fileSize = $_FILES['dp']['size'];
    $fileError = $_FILES['dp']['error'];
    $fileType = $_FILES['dp']['type']; 
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileActualExt, $allowed))
    {
        if ($fileError === 0)
        {
            if ($fileSize < 10000000)
            {
                $FileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/' . $FileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                // resizing of image if it's necessary
                resizeImage($fileDestination, $fileDestination, $fileActualExt);

                // you have to activate GD extention in your php.ini
                // convert an image in .Webp
                // create a WebP copy
                $webpName = uniqid('', true) . ".webp";
                $webpDestination = '../uploads/' . $webpName;

                switch ($fileActualExt) {
                    case 'jpg':
                    case 'jpeg':
                        $img = imagecreatefromjpeg($fileDestination);
                        break;
                    case 'png':
                        $img = imagecreatefrompng($fileDestination);
                        imagepalettetotruecolor($img);
                        imagealphablending($img, true);
                        imagesavealpha($img, true);
                        break;
                    case 'gif':
                        $img = imagecreatefromgif($fileDestination);
                        break;
                    default:
                        $img = null;
                        break;
                }

                if ($img !== null) {
                    imagewebp($img, $webpDestination, 100);
                    imagedestroy($img);
                }

            }
            else
            {
                header("Location: ../signup.php?error=imgsizeexceeded");
                exit(); 
            }
        }
        else
        {
            header("Location: ../signup.php?error=imguploaderror");
            exit();
        }
    }
    else
    {
        header("Location: ../signup.php?error=invalidimagetype");
        exit();
    }
}
