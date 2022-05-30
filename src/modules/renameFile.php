<?php

checkRenameFile();

function checkRenameFile()
{
    session_start();

    if (isset($_POST['submit'])) {

        if (isset($_GET['file'])) {

            $fileRename = $_POST['fileName'];
            $pattern = "/[a-zA-Z0-9]/";
            $originFile = dirname(getcwd(), 2) . $_GET['file'];

            if (is_dir(dirname(getcwd(), 2)  . $_GET['file'])) {
                //rename folder
                if (preg_match($pattern, $fileRename)) {
                    $destinationFile = dirname(getcwd(), 2) . $_SESSION['pathUser'] . $fileRename . "/";
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
                    $destinationFile = dirname(getcwd(), 2) . $_SESSION['pathUser'] . $fileRename . "." . $extension;
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
