<?php

function checkUser()
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = json_decode(file_get_contents(__DIR__ . './../db/db.json'), true);

    foreach ($data as $user) {

        $encPassword = password_hash($user['password'], PASSWORD_DEFAULT);
        var_dump($email);
        var_dump($user['email']);
        if ($user['email'] === $email) {

            if (password_verify($password, $encPassword)) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['firstname'] = $user['firstName'];
                $_SESSION['lastname'] = $user['lastName'];
                $_SESSION['img'] = $user['img'];
                $_SESSION['lastloggedIn'] = $user['lastLoggedIn'];
                $_SESSION['pathUser'] = $user['root'];
                header('Location: ../../../../index.php');
            } else {
                header('Location: ./login.php?passworderror=true');
            }
        } else {
            header('Location: ' . __DIR__ . './login.php?usererror=true');
        }
    }
}


function checkSession()
{

    session_start();

    if (!isset($_SESSION['email'])) {
        header('Location: ./src/app/components/loginpage/login.php');
    }
}


function getRootPath($user)
{
    $rootPath = getcwd();
    $rootPath .= "/root/$user/";
    $rootPath = str_replace("\\", "/", $rootPath);
    return $rootPath;
}
