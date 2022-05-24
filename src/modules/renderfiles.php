<?php
session_start();

$rootUser = $_SESSION["pathUser"];
// $myfiles = array_diff(scandir($rootUser), array('.', '..'));
// echo $rootUser;


  $expPath = explode("/", $currentPath);
  $startIndexRootPath = array_search("root", $expPath, true);
  $rootRelativePath = "./";
  for ($i = $startIndexRootPath; $i < count($expPath); $i++) {
    $rootRelativePath .=  $expPath[$i] . "/";
  }
  return $rootRelativePath;
