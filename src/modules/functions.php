<?php




function checkSession()
{
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: ./src/app/components/loginpage/login.php');
    }
}
