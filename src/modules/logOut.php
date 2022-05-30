<?php

if(isset($_GET['log'])){
    session_start();

    unset($_SESSION);

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
    header('Location: .././app/components/loginpage/login.php?exit=true');
}