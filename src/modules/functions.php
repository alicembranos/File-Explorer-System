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

    if (isset($_SESSION['pathUser'])) {
        $rootUserPath = $_SESSION['pathUser'];
        return $rootUserPath;
    }
}

//relative path from functions.php to base root folder
define('PATH_FUNCTIONS', realpath($_SERVER["DOCUMENT_ROOT"]) . '/Projects/00_LocalFileSystem/filesystem-explorer/');

//get files of a given directory
function getFiles($path, $arrayBase)
{
    $arrayFiles = [];

    foreach ($arrayBase as $file) {
        if (!is_dir($path . $file)) {
            $arrayFiles[] = $path . $file;
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
            $arrayDirectories[] = $path . $file;
        }
    }

    return $arrayDirectories;
}

//get the first $num files
function getFirstElementsArray($num, $array)
{
    return array_slice($array, 0, $num);
}

//sort array files by acces date
function sortByAccessDate($path, $arrayBase)
{
    $arrayToSort = [];
    foreach ($arrayBase as $file) {
        array_push($arrayToSort, $path . $file);
    }
    usort($arrayToSort, function ($a, $b) {
        return fileatime($b) - fileatime($a);
    });
    return $arrayToSort;
}

//get images src
function getImageExtension($file)
{
    $fileExtension = pathinfo($file)["extension"] ?? "";
    switch ($fileExtension) {
        case 'avi':
            return './src/assets/img/extensions/avi.png';
            break;
        case 'doc':
            return './src/assets/img/extensions/doc.png';
            break;
        case 'docx':
            return './src/assets/img/extensions/doc.png';
            break;
        case 'gif':
            return './src/assets/img/extensions/gif.png';
            break;
        case 'html':
            return './src/assets/img/extensions/html.png';
            break;
        case 'jpg':
            return './src/assets/img/extensions/jpg.png';
            break;
        case 'js':
            return './src/assets/img/extensions/js.png';
            break;
        case 'mov':
            return './src/assets/img/extensions/mov.png';
            break;
        case 'mp3':
            return './src/assets/img/extensions/mp3.png';
            break;
        case 'mp4':
            return './src/assets/img/extensions/mp4.png';
            break;
        case 'pdf':
            return './src/assets/img/extensions/pdf.png';
            break;
        case 'png':
            return './src/assets/img/extensions/png.png';
            break;
        case 'txt':
            return './src/assets/img/extensions/txt.png';
            break;
        case 'xls':
            return './src/assets/img/extensions/xls.png';
            break;
        case 'xlsx':
            return './src/assets/img/extensions/xls.png';
            break;
        default:
            return './src/assets/img/extensions/folder.png';
            break;
    }
}

//get size file
function getSizeFile($path, $file)
{
    return formatSizeUnits(filesize($file));
}

//get name file
function getNameFile($path, $file)
{
    $infoFile = pathinfo($path . $file);
    return $infoFile['basename'];
}

//format size of file in string
function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}
