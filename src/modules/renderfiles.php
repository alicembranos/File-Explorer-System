<?php
require_once('./functions.php');
//get path from root user folder
$rootUserPath = getRootRelativeUserPath();

$arrayFiles = array_diff(scandir($rootUserPath), array('.', '..'));

$filesList = getFiles($rootUserPath, $arrayFiles);
$directories = getFolders($rootUserPath, $arrayFiles);

foreach ($filesList as $file) {
  $infoFile = pathinfo($file);
  echo 'name' . $infoFile['basename'] . '<br/>';
  echo 'creation date' . filectime($file) . '<br/>';
  echo 'last modified date' . filemtime($file) . '<br/>';
  echo 'extension' . $infoFile['extension'] . '<br/>';
  echo 'size' . filesize($file) . '<br/>';
  echo 'last acces time of file' . fileatime($file) . '<br/>';
}
