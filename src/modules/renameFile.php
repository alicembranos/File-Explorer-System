<?php

require_once("./functions.php");

checkRenameFile();

function checkRenameFile()
{

    session_start();

    //get path from root user folder
    $dirToCompare = str_replace("\\", "/", dirname(__FILE__, 3));

    if (str_contains($_SESSION['pathUser'], $dirToCompare)) {
        $arrayBase = explode($dirToCompare, $_SESSION['pathUser']);
        $pathUser = end($arrayBase);
    } else {
        $pathUser = $_SESSION['pathUser'];
    }

    $rootUserPath = dirname(__DIR__, 2);

    if (isset($_POST['submit'])) {

        if (isset($_GET['file'])) {

            $fileRename = $_POST['fileName'];
            $pattern = "/[a-zA-Z0-9]/";
            $originFile = $rootUserPath . $_GET['file'];

            if (is_dir($originFile)) {

                //rename folder
                if (preg_match($pattern, $fileRename)) {
                    $destinationFile = $rootUserPath . $pathUser . "/" . $fileRename;
                    rename($originFile, $destinationFile);
                    header("Location: ../../.././index.php");
                } else {
                    $alert = "Not a valid folder name. Please insert a valid name.";
                    return $alert;
                }
            } else {
                //rename file
                if (preg_match($pattern, $fileRename)) {
                    $extension = pathinfo($originFile, PATHINFO_EXTENSION);
                    $destinationFile =  $rootUserPath . $pathUser . "/" . $fileRename . "." . $extension;
                    rename($originFile, $destinationFile);
                    header("Location: ../../.././index.php");
                } else {
                    $alert = "Not a valid file name. Please insert a valid name.";
                    return $alert;
                }
            }
        }
    }

    unset($_POST['submit']);
}
