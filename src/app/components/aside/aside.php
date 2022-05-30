<?php

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$job = $_SESSION['job'];
$imgSrc = $_SESSION['img'];

?>

<div class="profile__info">
    <img class="profile__image" src="<?= $imgSrc ?>">
    <h3><?= "$firstname $lastname" ?></h3>
    <span><?= $email ?></span>
    <span><?= $job ?></span>
</div>

<?php

//get path from root user folder
$rootUserPath = getRootRelativeUserPath();

//open session for all summary arrays
$_SESSION["summaryImages"] = [];
$_SESSION["summaryMediaFiles"] = [];
$_SESSION["summaryDocs"] = [];
$_SESSION["summaryOthers"] = [];

//get files of root path
$arrayFilesDir = getDirContents($rootUserPath);

//if theres is no session of type docs open, session has been initiated
if (isset($_SESSION["summaryImages"])) {

    //add files to its relative array
    foreach ($arrayFilesDir as $file) {
        $extension = pathinfo($file, PATHINFO_EXTENSION); //get extension
        fillSummaryArrays($extension, $file); //insert file in its array session
    }
}
?>

<div class="divider"></div>

<div class="media__files">
    <img class="summary__image" src="./src/assets/img/files/images.png">
    <div class="summaryInfo">
        <span class="summaryInfo__type">Images</span>
        <span class="summaryInfo__size"><?= getNumberOfFiles($_SESSION["summaryImages"]) ?> Files</span>
    </div>
    <span class="span__size"><?= getSizeArray($_SESSION["summaryImages"]) ?></span>
</div>
<div class="media__files">
    <img class="summary__image" src="./src/assets/img/files/mediafiles.png">
    <div class="summaryInfo">
        <span class="summaryInfo__type">Media Files</span>
        <span class="summaryInfo__size"><?= getNumberOfFiles($_SESSION["summaryMediaFiles"]) ?> Files</span>
    </div>
    <span class="span__size"><?= getSizeArray($_SESSION["summaryMediaFiles"]) ?></span>
</div>
<div class="media__files">
    <img class="summary__image" src="./src/assets/img/files/docs.png">
    <div class="summaryInfo">
        <span class="summaryInfo__type">Documents</span>
        <span class="summaryInfo__size"><?= getNumberOfFiles($_SESSION["summaryDocs"]) ?> Files</span>
    </div>
    <span class="span__size"><?= getSizeArray($_SESSION["summaryDocs"]) ?></span>
</div>
<div class="media__files">
    <img class="summary__image" src="./src/assets/img/files/others.png">
    <div class="summaryInfo">
        <span class="summaryInfo__type">Others</span>
        <span class="summaryInfo__size"><?= getNumberOfFiles($_SESSION["summaryOthers"]) ?> Files</span>
    </div>
    <span class="span__size"><?= getSizeArray($_SESSION["summaryOthers"]) ?></span>
</div>