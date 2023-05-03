<?php

namespace SuperWeek\Model;

use SuperWeek\Model\Database;
use pdo;
class Book extends Database
{
    public ?int $id = null;

    public function __construct()
    {
        parent::__construct();

        $this->dbConnect();
    }


    public function registerBook($title, $content, $iduser){
        $request = "INSERT INTO book (title, content, id_user)
        VALUES (:title, :content, :id_user)";
            $statement = $this->pdo->prepare($request);
            $statement ->execute([
                'title' => $title,
                'content' => $content,
                'id_user' => $iduser,
            ]);
            
            if ($statement) {
                return json_encode(['response' => 'ok', 'reussite' => 'Nouveau livre inscrit']);
            } else {
                return json_encode(['response' => 'not ok', 'echoue' => 'Echec']);
            }
    }


    public function allBooks(){
        $allBooks = $this->pdo->prepare("SELECT * FROM book");
        $allBooks->execute([
        ]);
        $result = $allBooks->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function theBook($id){
        $theBook = $this->pdo->prepare("SELECT * FROM book where id = $id");
        $theBook->execute([
        ]);
        $result = $theBook->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



}
?>