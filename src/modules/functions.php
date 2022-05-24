<?php

function checkUser(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = json_decode(file_get_contents('../db/db.json'), true);

    foreach($data as $user){

        $encPassword = password_hash($user['password'], PASSWORD_DEFAULT);

        if($user['email'] === $email){

            if(password_verify($password, $encPassword)){
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['firstname'] = $user['firstName'];
                $_SESSION['lastname'] = $user['lastName'];
                $_SESSION['img'] = $user['img'];
                $_SESSION['lastloggedIn'] = $user['lastLoggedIn'];
                $_SESSION['pathUser'] = $user['root'];
                header('Location: ./../index.php');
            }else{
                header('Location: ./src/app/components/loginpage/login.php?passworderror=true');
            }
        }else{
            header('Location: ./src/app/components/loginpage/login.php?usererror=true');
        }
    }
}


function checkSession(){

    session_start();

    if(!isset($_SESSION['email'])){
        header('Location: ./src/app/components/loginpage/login.php');
    }
}

?>