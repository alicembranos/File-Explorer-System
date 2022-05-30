<?php

require_once __DIR__ . './functions.php';

checkRenameFile();

function checkRenameFile()
{
    session_start();

    echo "fuera" . $_POST['submit1'];

    if (isset($_POST['submit1'])) {

        echo $_POST['submit1'];
        if (isset($_GET['file'])) {

            $fileRename = $_POST['fileName'];

            $pattern = "/[a-zA-Z0-9]/";

            echo is_dir(isset($_GET['file']));
            // if (is_dir(isset($_GET['file']))) {

                // if (preg_match($pattern, $fileRename)) {
                //     $originFile = dirname(getcwd(), 2) . $_GET['file'];
                //     $destinationFile = dirname(getcwd(), 2) . $_SESSION['pathUser'] . $fileRename . "/";
                //     rename($originFile, $destinationFile);
                //     header("Location: ../../.././index.php");
                // } else {
                //     $alert = "Not a valid name file. Please insert a valid name.";
                //     return $alert;
                // }

            // } else {

                // if (preg_match($pattern, $fileRename)) {
                //     $originFile = dirname(getcwd(), 2) . $_GET['file'];
                //     $extension = pathinfo($originFile, PATHINFO_EXTENSION);
                //     $destinationFile = dirname(getcwd(), 2) . $_SESSION['pathUser'] . $fileRename . "." . $extension;
                //     rename($originFile, $destinationFile);
                //     header("Location: ../../.././index.php");
                // } else {
                //     $alert = "Not a valid name file. Please insert a valid name.";
                //     return $alert;
                // }
            // }
        }
    }
    unset($_POST['submit1']);
}
