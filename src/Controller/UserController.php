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
        $first_name = $faker->firstNameFemale();
        $last_name = $faker->lastName();
        $emailEnd = $faker->freeEmailDomain();
        $email = $first_name.".".$last_name."@".$emailEnd;
        $success = $this->user->createUser($email, $first_name, $last_name);
        return $success;

    }

    public function testFaker(){
        $faker = Factory::create();
            // generate data by calling methods
            echo $faker->name();
            // 'Vince Sporer'
    }
}

?>