<?php

require_once __DIR__ . './functions.php';

checkRenameFile();

function checkRenameFile()
{
    session_start();

    if (isset($_POST['submit'])) {

        if (isset($_GET['file'])) {
            $fileRename = $_POST['fileName'];

            $pattern = "/[a-zA-Z0-9]/";

            if (preg_match($pattern, $fileRename)) {
                $originFile = dirname(getcwd(), 2) . $_GET['file'];
                $extension = pathinfo($originFile, PATHINFO_EXTENSION);
                $destinationFile = dirname(getcwd(), 2) . $_SESSION['pathUser'] . $fileRename . "." . $extension;
                rename($originFile, $destinationFile);
                header("Location: ../../.././index.php");
            } else {
                $alert = "Not a valid name file. Please insert a valid name.";
                return $alert;
            }
        }
    }
}
