<?php
require_once('./loginClass.php');
require_once('../../../modules/functions.php');

checkSessionLogin();

if (isset($_POST['submit'])) {
    $user = new LoginUser($_POST['email'], $_POST['password']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="./login.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <main class="main__container">
        <form class="form__login" method="POST" action="" enctype="multipart/form-data">
            <input class="formLogin__input" name="email" type="email" placeholder="Introduce your email">
            <input class="formLogin__input" name="password" type="password" placeholder="Introduce your password">
            <div class="buttons__div">
                <button class="formLogin__button" type="submit" name="submit">LOGIN</button>
                <button class="formLogin__button" type="button"><a href="../index.php">CANCEL</a></button>
            </div>
            <p class="error"><?php echo @$user->error ?></p>
        </form>
    </main>
</body>

</html>