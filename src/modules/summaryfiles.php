<?php

require_once __DIR__ . './functions.php';

session_start();

//get path from root user folder
$rootUserPath = getRootRelativeUserPath();

// $arrayFiles = array_diff(scandir($rootUserPath), array('.', '..'));

// getAllFiles($rootUserPath);


getDirContents($rootUserPath);