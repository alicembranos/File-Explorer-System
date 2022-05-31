<?php

require_once __DIR__ . './functions.php';

session_start();

//get path from root user folder
$rootUserPath = getRootRelativeUserPath();

//if theres is no session of type docs open, session has been initiated
if (!isset($_SESSION["summaryImages"])) {

    //open session for all summary arrays
    $_SESSION["summaryImages"] = [];
    $_SESSION["summaryMediaFiles"] = [];
    $_SESSION["summaryDocs"] = [];
    $_SESSION["summaryOthers"] = [];

    //get files of root path
    $arrayFilesDir = getDirContents($rootUserPath);

    //add files to its relative array
    foreach ($arrayFilesDir as $file) {

        $extension = pathinfo($file, PATHINFO_EXTENSION); //get extension
        fillSummaryArrays($extension, $file); //insert file in its array session

    }
} else {
    if (isset($_GET["filesummary"])) {
        //insert file in its array session
    }
}
?>

<div class="media__files">
    <img src="./src/assets/img/files/images.png" style="width: 48px;">
    <div>
        <span>Images</span>
        <span><?= getNumberOfFiles($_SESSION["summaryImages"]) ?> Files</span>
    </div>
    <span><?= getSizeArray($_SESSION["summaryImages"]) ?></span>
</div>
<div class="media__files">
    <img src="./src/assets/img/files/mediafiles.png" style="width: 48px;">
    <div>
        <span>Media Files</span>
        <span><?= getNumberOfFiles($_SESSION["summaryMediaFiles"]) ?> Files</span>
    </div>
    <span><?= getSizeArray($_SESSION["summaryMediaFiles"]) ?></span>
</div>
<div class="media__files">
    <img src="./src/assets/img/files/docs.png" style="width: 48px;">
    <div>
        <span>Documents</span>
        <span><?= getNumberOfFiles($_SESSION["summaryDocs"]) ?> Files</span>
    </div>
    <span><?= getSizeArray($_SESSION["summaryDocs"]) ?></span>
</div>
<div class="media__files">
    <img src="./src/assets/img/files/others.png" style="width: 48px;">
    <div>
        <span>Others</span>
        <span><?= getNumberOfFiles($_SESSION["summaryOthers"]) ?> Files</span>
    </div>
    <span><?= getSizeArray($_SESSION["summaryOthers"]) ?></span>
</div>