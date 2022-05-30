<?php

class LoginUser
{

    //class properties
    private $email;
    private $password;
    public $error;
    public $success;
    private $storage = "../../../db/db.json";
    private $stored_users;

    //class methods

    public function __construct($email, $password)
    {

        $this->email = $email;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->login();
    }

    private function login()
    {
        foreach ($this->stored_users as $user) {
            if ($user['email'] == $this->email) {
                if (password_verify($this->password, $user['password'])) {
                    session_start();
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['password'] = $user['password'];
                    $_SESSION['firstname'] = $user['firstName'];
                    $_SESSION['lastname'] = $user['lastName'];
                    $_SESSION['img'] = $user['img'];
                    $_SESSION['job'] = $user['job'];
                    $_SESSION['pathUser'] = $user['root'];
                    $_SESSION['pathUserBackUp'] = $user['root'];

                    header('Location: ../../../../index.php');
                    exit();
                }
            }
        }
        return $this->error = "Wrong username or password";
    }
}
