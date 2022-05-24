<?php
    require_once('./src/modules/functions.php');
    checkSession();
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

            <section class="recentfiles__section">
                <article class="card" style="width: 18rem;">
                    <img src="./src/assets/img/extensions/avi.png" class="card-img-top" alt="avi-file-img" style="width: 48px;">
                    <div class="card-body">
                        <h5 class="card-title">pelicula.avi</h5>
                        <p class="card-text">512KB</p>
                        <div class="card__actionbuttons">
                            <button class="card__icon"><i class="fa-solid fa-download"></i></button>
                            <button class="card__icon"><i class="fa-solid fa-pencil"></i></button>
                            <button class="card__icon"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </article>
            </section>

            <div class="listfile--items">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Created</th>
                            <th scope="col">Modified</th>
                            <th scope="col">Type</th>
                            <th scope="col">Size</th>
                            <th scope="col">Action Colums</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <aside class="main__aside">
                <?php
                require('./src/app/components/aside/aside.php');
                ?>
            </aside>
    </main>

    <?php
    // echo getcwd();  //muestra el directorio actual
    // chdir();         //cambia el directorio
    ?>
</body>

</html>