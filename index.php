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
        <!--Navigation Bar-->
        <navbar class="main__navbar">
            <div class="navbar__start">
                <img class="navbar__logo" src="./src/assets/img/aside/cloud.png">
                <img class="navbar__logo" src="./src/assets/img/aside/window.png">
                <img class="navbar__logo" src="./src/assets/img/aside/users.png">
                <img class="navbar__logo" src="./src/assets/img/aside/messages.png">
                <img class="navbar__logo" src="./src/assets/img/aside/trash.png">
            </div>
            <div class="navbar__end"><img class="navbar__logo" src="./src/assets/img/aside/logout.png"></div>
        </navbar>
        <!--Navigation Bar-->
        <section class="main__section">
            <!--Search Bar Section-->
            <div class="section__searchbar">
                <form class="d-flex" role="search" action="./index.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" id="search" aria-label="Search" onblur="this.form.action +='?search=' +this.value; this.form.submit()">
                    <button class="btn btn-primary" type="submit" name="submit-search" onchange=""><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <!--Search Bar Section-->
            <!--Recent files Section-->
            <section class="recentfiles__section">
                <?php
                require_once(__DIR__ . '/src/modules/recentfiles.php');
                ?>

            </section>
            <!--Recent files Section-->
            <!--Actions Menu-->
            <div class="section__actions">
                <div class="display__filters">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
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
                            Sort
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
                        <li class="dropdown-item">
                            <button id="createFolder" type="button" data-bs-toggle="modal" data-bs-target="#modalCreateFolder">
                                <i class="fa-solid fa-folder-plus"></i>
                                <span>Create Folder</span>
                            </button>
                        </li>
                        <li class="dropdown-item">
                            <form action="./src/modules/upload.php" method="POST" enctype="multipart/form-data">
                                <label>
                                    <i class="fa-solid fa-upload"></i>
                                    <span>Upload File</span>
                                    <input type="file" name="file" onchange="this.form.submit();" style="display: none;">
                                </label>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Actions Menu-->
            <!-- List of files section -->
            <div class="listfile--items">
                <?php
                require_once __DIR__ . '/src/modules/renderfiles.php';
                ?>
            </div>
            <!-- List of files section -->
        </section>
        <!--Aside Section-->
        <aside class="main__aside">
            <?php
            require('./src/app/components/aside/aside.php');
            ?>
        </aside>
        <!--Aside Section-->
    </main>
    <?php
    require("./src/modules/modals.php");
    ?>
</body>

</html>