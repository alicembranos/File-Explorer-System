<?php

require_once(__DIR__ . ' ./functions.php');

$arrayPath = explode("/", $_SESSION["pathUser"]);

$positionSearch = array_search("root", $arrayPath, true) + 2;



//get path from root user folder
$rootUserPath = getRootRelativeUserPath($_SESSION['pathUser']);

$ref = "";
?>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a class="current-path" href="src/modules/updating_path.php?updatedPath=<?php echo $_SESSION['pathUserBackUp'] ?>">Home</a></li>
        <?php for ($i = $positionSearch; $i < count($arrayPath); $i++) : ?>
            <?php
            $ref .=  $arrayPath[$i] . "/";
            ?>
            <li class="breadcrumb-item" aria-current="page"><a class="current-path" href="src/modules/updating_path.php?updatedPath=<?= $_SESSION['pathUserBackUp'] ?><?= $ref ?>"><?= $arrayPath[$i] ?></a></li>
        <?php endfor ?>
    </ol>
</nav>