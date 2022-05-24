<?php


$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$logedIn = $_SESSION['lastloggedIn'];
$imgSrc = $_SESSION['img'];

?>

<div class="profile__info">
    <img src="<?= $imgSrc ?>">
    <h3><?= "$firstname $lastname" ?></h3>
    <span><?= $email ?></span>
    <span><?= $logedIn ?></span>
</div>

<div class="summary__files">
    <div class="media__files">
        <img src="../../../assets/img/files/docs.png" style="width: 48px;">
        <div>
            <span>Documents</span>
            <span>24 Files</span>
        </div>
        <span>48GB</span>
    </div>
    <div class="media__files">
        <img src="../../../assets/img/extensions/avi.png" style="width: 48px;">
        <div>
            <span>Images</span>
            <span>24 Files</span>
        </div>
        <span>48GB</span>
    </div>
    <div class="media__files">
        <img src="../../../assets/img/files/files.png" style="width: 48px;">
        <div>
            <span>Others</span>
            <span>24 Files</span>
        </div>
        <span>48GB</span>
    </div>
</div>