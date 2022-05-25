<?php
require_once(__DIR__ . ' /src/modules/functions.php');
checkSessionIndex();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ae63adffc0.js" crossorigin="anonymous" defer></script>
    <link href="./src/assets/css/main.css" rel="stylesheet">
</head>

<body>
    <main class="main__content">
        <navbar class="main__navbar">
            <img class="navbar__logo" src="./src/assets/img/aside/317713_drive_google_google drive_icon.png">
            <img class="navbar__buttons" src="./src/assets/img/aside/1814090_delete_garbage_trash_icon.png">
            <img class="navbar__logout" src="./src/assets/img/aside/7853741_logout_kashifarif_exit_out_close_icon.png">
        </navbar>
        <section class="main__section">
            <div class="section__searchbar">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <section class="recentfiles__section">
                <?php
                // import recent files modules
                // require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/Projects/00_LocalFileSystem/filesystem-explorer/src/modules/recentfiles.php');
                require_once(__DIR__ . '/src/modules/recentfiles.php');
                ?>

            </section>

            <div class="section__actions">
                <div class="display__filters">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            FILTER
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Documents</a></li>
                            <li><a class="dropdown-item" href="#">Folders</a></li>
                            <li><a class="dropdown-item" href="#">Img</a></li>
                            <li><a class="dropdown-item" href="#">Media Files</a></li>
                        </ul>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            SORT
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Alphabetically</a></li>
                            <li><a class="dropdown-item" href="#">Upload Date</a></li>
                        </ul>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        New Item
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Create Directory</a></li>
                        <li><a class="dropdown-item" href="#">Upload File</a></li>
                    </ul>
                </div>
            </div>

            <div class="listfile--items">
                <?php
                require_once __DIR__ . '/src/modules/renderfiles.php';
                showTable();
                ?>
            </div>
        </section>
        <aside class="main__aside">
            <?php
            require('./src/app/components/aside/aside.php');
            ?>
        </aside>
    </main>

    <?php
    ?>
</body>

</html>