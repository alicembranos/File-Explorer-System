<?php
$data = file_get_contents("D:/Wamp/www/AseemblerPHP/filesystem-explorer/src/db/db.json");
$users = json_decode($data, true);

$firstname = $users['users'][0]['firstName'];
$lastname = $users['users'][0]['lastName'];
$email = $users['users'][0]['email'];
$logedIn = $users['users'][0]['lastLoggedIn'];
$imgSrc = $users['users'][0]['img'];

?>

<div class="profile__info">
    <img src="<?= $imgSrc?>">
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