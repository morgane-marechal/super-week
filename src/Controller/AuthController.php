<?php

namespace SuperWeek\Controller;
use SuperWeek\Model\User;
use Faker\Factory;



class AuthController
{

    public object $user;

    public function __construct()
    {
        $this->user = new User();

    }

    public function showPage()
    {

        require __DIR__ . '/../views/home.php';
    }

    public function register($email, $first_name, $last_name, $password, $checkPassword){
        require __DIR__ . '/../View/register.php';
        if($password === $checkPassword){
            $success = $this->user->register($email, $first_name, $last_name, $password);
            return $success;
        }
    }

    public function login($email, $password){
        require __DIR__ . '/../View/login.php';
        $success = $this->user->login($email, $password);
        return $success;
    }


}

?>