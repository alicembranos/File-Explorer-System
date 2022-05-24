<?php 
    function checkUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $data = json_decode(file_get_contents('../../../db/db.json'), true);
    
        foreach ($data as $user) {
    
            $encPassword = password_hash($user['password'], PASSWORD_DEFAULT);
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

                    echo "hemos entrado";

                    header('Location: ../../../../index.php');
                 } else {
                    header('Location: ./login.php?passworderror=true');
                }
            } else {
                header('Location: ./login.php?usererror=true');
            }
        }
    }

    checkUser();

?>