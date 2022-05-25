<?php

function checkSessionIndex()
{
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: ./src/app/components/loginpage/login.php");
    }
}

function checkSessionLogin()
{
    session_start();
    if (isset($_SESSION['email'])) {
        header("Location: ../../../../index.php");
    }
}

function getRootRelativeUserPath()
{
    session_start();
    if (isset($_SESSION['pathUser'])) {
        $rootUserPath = PATH_FUNCTIONS . $_SESSION['pathUser'];
        return $rootUserPath;
    }
}

//relative path from functions.php to base root folder
define('PATH_FUNCTIONS', '../../');

//get files of a given directory
function getFiles($path, $arrayBase)
{
    $arrayFiles = [];

    foreach ($arrayBase as $file) {
        if (!is_dir($path . $file)) {
            $arrayFiles[] = $file;
        }
    }

    return $arrayFiles;
}

//get direcotires of a given directory
function getFolders($path, $arrayBase)
{

    $arrayDirectories = [];

    foreach ($arrayBase as $file) {
        if (is_dir($path . $file)) {
            $arrayDirectories[] = $file;
        }
    }

    return $arrayDirectories;
}
