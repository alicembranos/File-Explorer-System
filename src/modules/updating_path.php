<?php

require_once __DIR__ . './functions.php';
session_start();
checkPath();
header("Location:./../../index.php");

function checkPath()
{

  $userRootPath = getRoothPathDirectoryFolder();

  if (isset($_GET["updatedPath"])) {
    $_SESSION["pathUser"] = $_GET["updatedPath"];
  } else {
    $_SESSION["pathUser"] = $userRootPath;
  }

}
