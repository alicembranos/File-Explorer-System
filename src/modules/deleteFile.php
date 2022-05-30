<?php

checkDeleteFile();

function checkDeleteFile()
{
    session_start();

    if (isset($_POST['submit'])) {

        if (isset($_GET['file'])) {
            if (is_dir(dirname(getcwd(), 2)  . $_GET['file'])) {
                //remove folder
                $folder = dirname(getcwd(), 2) . $_GET['file'];
                rmdir($folder);
                header("Location: ../../.././index.php");
            } else {
                //rename file
                $file = dirname(getcwd(), 2) . $_GET['file'];
                unlink($file);
                header("Location: ../../.././index.php");
            }
        }
    }

    unset($_POST['submit']);
}
