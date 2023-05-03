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

    public function displayUsers()
    {
        $success = $this->user->displayUsers();
        return json_encode($success);
    }

    public function createUsers()
    {        
        $faker = Factory::create();
        $first_name = $faker->firstName();
        $last_name = $faker->lastName();
        $emailEnd = $faker->freeEmailDomain();
        $email = strtolower($first_name).".".strtolower($last_name)."@".$emailEnd;
        $password = 'Azerty12';
        $success = $this->user->createUser($email, $first_name, $last_name, $password);
        return $success;
    }

    public function testFaker(){
        $faker = Factory::create();
            echo $faker->name();
    }

    public function getUserInfo($id){
        $success = $this->user->getUserInfo($id);
        return json_encode($success);
    }
}

?>