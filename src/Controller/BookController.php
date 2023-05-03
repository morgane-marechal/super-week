<?php

namespace SuperWeek\Controller;
use SuperWeek\Model\User;
use SuperWeek\Model\Book;

use Faker\Factory;



class BookController
{

    public object $user;

    public function __construct()
    {
        $this->book = new Book();
    }

    public function registerBook($title, $content){
        $iduser = $_SESSION['id'];
        $success = $this->book->registerBook($title, $content, $iduser);
        return $success;
    }

    public function allBooks(){
        $success = $this->book->allBooks();
        return json_encode($success);
    }

    public function theBook($id){
        $success = $this->book->theBook($id);
        return json_encode($success);
    }


}

?>