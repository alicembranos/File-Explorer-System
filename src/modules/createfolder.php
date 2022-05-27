<?php

require_once __DIR__ . './functions.php';

checkFolderCreation();

function checkFolderCreation()
{
    session_start();

    if (isset($_POST['submit'])) {

        $rootPath = dirname(getcwd(), 2) . $_SESSION['pathUser'];
        $folderName = $_POST['folderName'];
        $directory = $rootPath . $folderName;
        $pattern = "/[a-zA-Z0-9]/";

        if (preg_match($pattern, $folderName)) {
            echo "entro";
            mkdir($directory, 0777, true);
            header("Location: ../../index.php");
        } else {
            $alert = "Not a valid name folder. Please insert a valid name.";
            return $alert;
        }
    }
}
