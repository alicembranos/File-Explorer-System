<?php

include_once __DIR__ . './functions.php';
session_start();
checkPath();
header("Location:./../../index.php");

function checkPath()
{

    if (isset($_GET["updatedPath"])) {
        $rootPath = getRoothPathDirectoryFolder($_GET["updatedPath"]);
        $_SESSION["pathUser"] = $rootPath;
    } else {
        $rootPath = getRoothPathDirectoryFolder("");
        $_SESSION["pathUser"] = $rootPath;
    }

}
