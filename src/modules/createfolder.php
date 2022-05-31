<?php

checkFolderCreation();

function checkFolderCreation()
{
    session_start();

    if (isset($_POST['submit'])) {

        //get path from root user folder
        $dirToCompare = str_replace("\\", "/", dirname(__FILE__, 3));
        $folderName = $_POST['folderName'];

        if (str_contains($_SESSION['pathUser'], $dirToCompare)) {
            $arrayBase = explode($dirToCompare, $_SESSION['pathUser']);
            $pathUser = end($arrayBase);
            $rootPath = dirname(getcwd(), 2) . $pathUser;
            $directory = $rootPath . "/" . $folderName;
        } else {
            $pathUser = $_SESSION['pathUser'];
            $rootPath = dirname(getcwd(), 2) . $pathUser;
            $directory = $rootPath . $folderName;
        }

        $pattern = "/[a-zA-Z0-9]/";

        if (preg_match($pattern, $folderName)) {
            mkdir($directory, 0777, true);
            header("Location: ../.././index.php");
        } else {
            $alert = "Not a valid name folder. Please insert a valid name.";
            return $alert;
        }
    }
}
