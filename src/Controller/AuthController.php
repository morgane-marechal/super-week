<?php

namespace SuperWeek\Controller;
use SuperWeek\Model\User;
use Faker\Factory;



class UserController
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


}

?>