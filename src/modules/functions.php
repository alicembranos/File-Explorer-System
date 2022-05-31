<?php

function checkUser()
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    $data = json_decode(file_get_contents('../../../db/db.json'), true);

    foreach ($data as $user) {

        $encPassword = password_hash($user['password'], PASSWORD_DEFAULT);
        if ($user['email'] === $email) {


            if (password_verify($password, $encPassword)) {

                var_dump(password_verify($password, $encPassword));

                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;
                            $_SESSION['firstname'] = $user['firstName'];
                            $_SESSION['lastname'] = $user['lastName'];
                            $_SESSION['img'] = $user['img'];
                            $_SESSION['lastloggedIn'] = $user['lastLoggedIn'];
                            $_SESSION['pathUser'] = $user['root'];

                            header('Location: ../../../../index.php');
                        } else {
                            header('Location: ./login.php?passworderror=true');
                        }
            } else {
                header('Location: ./login.php?usererror=true');
        }
    }
}

function checkSessionIndex()
{
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: ./src/app/components/loginpage/login.php");
    }
}

//check session login 
function checkSessionLogin()
{
    // session_start();
    if (isset($_SESSION['email'])) {
        header("Location: ../../../../index.php");
    }
}

//get the root path of the user
function getRootRelativeUserPath()
{

    if (isset($_SESSION['pathUser'])) {

        if (mb_substr_count($_SESSION['pathUser'], "filesystem-explorer") === 1) {
            // $expPath = explode("/", $_SESSION['pathUser']);
            $rootPath = $_SESSION['pathUser'];
            $rootPath .= "/";
            $rootPath = str_replace("\\", "/", $rootPath);
        } else {
            $rootPath = getcwd();
            $rootPath .= $_SESSION['pathUser'];
            $rootPath = str_replace("\\", "/", $rootPath);
        }
        return $rootPath;
    }
}

//get the path of a directory
function getRoothPathDirectoryFolder()
{
    $rootPath = getcwd();
    $rootPath = str_replace("\\", "/", $rootPath);
    $rootPath .= $_SESSION["pathUserBackUp"];
    return $rootPath;
}

//relative path from functions.php to base root folder
define('PATH_FUNCTIONS', realpath($_SERVER["DOCUMENT_ROOT"]) . '/Projects/00_LocalFileSystem/filesystem-explorer/');

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

//get the first $num files
function getFirstElementsArray($num, $array)
{
    return array_slice($array, 0, $num);
}

//get icon extension
function getIconExtension($extension)
{
    switch ($extension) {
        case 'txt':
            return '<i class="fa-solid fa-file icons"></i>';
            break;
        case 'doc':
            return '<i class="fa-solid fa-file-word icons"></i>';
            break;
        case 'avi':
            return '<i class="fa-solid fa-file-video icons"></i>';
            break;
        case 'gif':
            return '<i class="fa-solid fa-file-image icons"></i>';
            break;
        case 'html':
            return '<i class="fa-brands fa-html5 icons"></i>';
            break;
        case 'jpg':
            return '<i class="fa-solid fa-file-image icons"></i>';
            break;
        case 'js':
            return '<i class="fa-solid fa-file-code icons"></i>';
            break;
        case 'mov':
            return '<i class="fa-solid fa-file-video icons"></i>';
            break;
        case 'mp3':
            return '<i class="fa-solid fa-file-audio icons"></i>';
            break;
        case 'mp4':
            return '<i class="fa-solid fa-file-audio icons"></i>';
            break;
        case 'pdf':
            return '<i class="fa-solid fa-file-pdf icons"></i>';
            break;
        case 'png':
            return '<i class="fa-solid fa-file-image icons"></i>';
            break;
        case 'xls':
            return '<i class="fa-solid fa-file-excel icons"></i>';
            break;
        case 'xlsx':
            return '<i class="fa-solid fa-file-excel icons"></i>';
            break;
        default:
            return '<i class="fa-solid fa-folder icons"></i>';
            break;
    }
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

//get file and folders of a directory with recursivity
function getDirContents($path)
{
    $arrayResult = [];
    $dir = new RecursiveDirectoryIterator(realpath($path), RecursiveDirectoryIterator::SKIP_DOTS);
    $it = new RecursiveIteratorIterator($dir);

    foreach ($it as $file) {
        array_push($arrayResult, $file->getRealPath());
    }

    return $arrayResult;
}

function fillSummaryArrays($extension, $file)
{
    switch ($extension) {
        case 'avi':
            array_push($_SESSION["summaryMediaFiles"], $file);
            break;
        case 'doc':
            array_push($_SESSION["summaryDocs"], $file);
            break;
        case 'docx':
            array_push($_SESSION["summaryDocs"], $file);
            break;
        case 'gif':
            array_push($_SESSION["summaryImages"], $file);
            break;
        case 'html':
            array_push($_SESSION["summaryOthers"], $file);
            break;
        case 'jpg':
            array_push($_SESSION["summaryImages"], $file);
            break;
        case 'js':
            array_push($_SESSION["summaryOthers"], $file);
            break;
        case 'mov':
            array_push($_SESSION["summaryMediaFiles"], $file);
            break;
        case 'mp3':
            array_push($_SESSION["summaryMediaFiles"], $file);
            break;
        case 'mp4':
            array_push($_SESSION["summaryMediaFiles"], $file);
            break;
        case 'pdf':
            array_push($_SESSION["summaryDocs"], $file);
            break;
        case 'png':
            array_push($_SESSION["summaryImages"], $file);
            break;
        case 'txt':
            array_push($_SESSION["summaryDocs"], $file);
            break;
        case 'xls':
            array_push($_SESSION["summaryDocs"], $file);
            break;
        case 'xlsx':
            array_push($_SESSION["summaryDocs"], $file);
            break;
        default:
            array_push($_SESSION["summaryOthers"], $file);
            break;
    }
}

//get the size of an array files
function getSizeArray($array)
{
    $totalSize = 0;
    foreach ($array as $file) {
        $totalSize += filesize($file);
    }

    return formatSizeUnits($totalSize);
}

//get the number of files of an array
function getNumberOfFiles($array)
{
    return count($array);
}

//search if string is contained in a file/directory name, and return match file/directorie array
function search($path, $word)
{

    $arrayMatch = [];
    $dir = new DirectoryIterator(realpath($path));
    $it = new IteratorIterator($dir);

    foreach ($it as $file) {
        $wordToSearch = strtolower($word);
        $fileToSearch = strtolower($file->getFilename());
        if (str_contains($fileToSearch, $wordToSearch)) {
            $arrayPath = explode(realpath($path), $file->getPathInfo());
            $fileMatch =  end($arrayPath) . '/' . $file->getFileName();
            array_push($arrayMatch, $fileMatch);
        }
    }

    return $arrayMatch;
}
