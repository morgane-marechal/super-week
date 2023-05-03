<?php

namespace SuperWeek\Model;

use SuperWeek\Model\Database;
use pdo;
class User extends Database
{
    public ?int $id = null;
    public ?string $firstname = null;
    public ?string $lastname = null;
    public ?string $mail = null;

    public function __construct()
    {
        parent::__construct();

        $this->dbConnect();
    }


    public function displayUsers(){
        $displayUsers = $this->pdo->prepare("SELECT * FROM user");
        $displayUsers->execute([
        ]);
        $result = $displayUsers->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createUser($email, $first_name, $last_name, $password){
        $request = "INSERT INTO user (email, first_name, last_name, password)
        VALUES (:email, :first_name, :last_name, :password)";
            $statement = $this->pdo->prepare($request);
            $statement ->execute([
                'email' => $email,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);          
    }
}