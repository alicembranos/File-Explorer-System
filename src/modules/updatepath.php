<?php

include_once __DIR__ . './functions.php';
session_start();
checkPath();
// header("Location:./../../index.php");

function checkPath()
{
    // $rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";

    $rootPath = getRoothPathDirectoryFolder();

    echo $_GET["updatedPath"];
    if (isset($_GET["updatedPath"])) {
        $_SESSION["currentPath"] = $_GET["updatedPath"];
    } else {
        $_SESSION["currentPath"] = $rootPath;
    }

}
