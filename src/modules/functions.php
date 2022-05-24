<?php

function checkSession()
{
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: ./src/app/components/loginpage/login.php');
    }
}

function getRootPath($user)
{
    $rootPath = getcwd();
    $rootPath .= "/root/$user/";
    $rootPath = str_replace("\\", "/", $rootPath);
    return $rootPath;
}
