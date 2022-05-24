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

function getRootPath()
{
    $rootPath = getcwd();
    // $rootPath .= "/root/";
    $rootPath = str_replace("\\", "/", $rootPath);
    return $rootPath;
}
