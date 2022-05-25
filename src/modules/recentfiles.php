<?php
// require_once('./functions.php');

//get path from root user folder
$rootUserPath = getRootRelativeUserPath();

//get the files of the user's folder
$arrayFiles = array_diff(scandir($rootUserPath), array('.', '..'));

//sort array by acces date
$arraySort = sortByAccessDate($rootUserPath, $arrayFiles);

//get five first elements
$_SESSION["recentFiles"] = getFirstElementsArray(5, $arraySort);

?>
<?php if (isset($_GET['recentFile']) && !in_array($_GET['recentFile'], $_SESSION["recentFiles"])) :
    array_unshift($_SESSION["recentFiles"], $_GET['recentFile']); //insert at the begining
    array_pop($_SESSION["recentFiles"]);  //delete last element
?>
    <?php foreach ($_SESSION["recentFiles"] as $recentFile) : ?>
        <article class="card" style="width: 18rem;">
            <p><?= getImageExtension($recentFile) ?></p>
            <!-- <img src="" class="card-img-top" alt="avi-file-img" style="width: 48px;"> -->
            <div class="card-body">
                <h5 class="card-title"><?= getNameFile($rootUserPath, $recentFile) ?></h5>
                <p class="card-text"><?= getSizeFile($rootUserPath, $recentFile) ?></p>
                <div class="card__actionbuttons">
                    <button class="card__icon"><i class="fa-solid fa-d ownload"></i></button>
                    <button class="card__icon"><i class="fa-solid fa-pencil"></i></button>
                    <button class="card__icon"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        </article>
    <?php endforeach ?>
<?php else : ?>
    <?php foreach ($_SESSION["recentFiles"] as $recentFile) : ?>
        <article class="card" style="width: 18rem;">
            <img src="<?= getImageExtension($recentFile) ?>" class="card-img-top" alt="avi-file-img" style="width: 48px;">
            <div class="card-body">
                <!-- <h5 class="card-title"><?= getNameFile($rootUserPath, $recentFile) ?></h5> -->
                <a href="<?= $recentFile ?>"><h5 class="card-title"><?= getNameFile($rootUserPath, $recentFile) ?></h5></a>
                <p class="card-text"><?= getSizeFile($rootUserPath, $recentFile) ?></p>
                <div class="card__actionbuttons">
                    <button class="card__icon"><i class="fa-solid fa-d ownload"></i></button>
                    <button class="card__icon"><i class="fa-solid fa-pencil"></i></button>
                    <button class="card__icon"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        </article>
    <?php endforeach ?>
<?php endif ?>