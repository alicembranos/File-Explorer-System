<?php

require_once __DIR__ . './functions.php';

session_start();

$rootPath = getRootRelativeUserPath();

if (isset($_FILES['file'])) {

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Set allowed extensions 
    $allowed = array('doc', 'csv', 'jpg', 'png', 'txt', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4', 'html', 'js', 'gif', 'docx', 'xls', 'xlsx');

    if (in_array(end($fileExt), $allowed)) {
        if ($fileError == 0) {
            if ($fileSize <= 1000000000000000) {
                $fileDest =  dirname(__DIR__, 2) . $_SESSION["pathUser"] . $fileName;
                move_uploaded_file($fileTmpName, $fileDest);
                header("Location: ../../index.php");
            }
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}
