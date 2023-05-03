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
        if (!$this->verifUser($email)){
            $statement = $this->pdo->prepare($request);
            $statement ->execute([
                'email' => $email,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            
            if ($statement) {
                return json_encode(['response' => 'ok', 'reussite' => 'Ajout utilisateurs']);
            } else {
                return json_encode(['response' => 'not ok', 'echoue' => 'Echec']);
            }
        }else{
            return json_encode(['response' => 'not ok', 'echoue' => 'Cet utilisateur existe déjà']);

        }
    }

    public function register($email, $first_name, $last_name, $password){
        $request = "INSERT INTO user (email, first_name, last_name, password)
        VALUES (:email, :first_name, :last_name, :password)";
        if (!$this->verifUser($email)){
            $statement = $this->pdo->prepare($request);
            $statement ->execute([
                'email' => $email,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            
            if ($statement) {
                return json_encode(['response' => 'ok', 'reussite' => 'Vous êtes inscrit']);
            } else {
                return json_encode(['response' => 'not ok', 'echoue' => 'Echec inscription']);
            }
        }else{
            return json_encode(['response' => 'not ok', 'echoue' => 'Vous êtes déjà inscrit']);

        }
    }

    public function verifUser($email)
    {
            $sql = "SELECT * 
                    FROM user
                    WHERE email = :email";
            $sql_exe = $this->pdo->prepare($sql);
            $sql_exe->execute([
                'email' => $email,
            ]);
            $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
            if ($results) {
                return true;
            } else {
                return false;
            }
    }

}