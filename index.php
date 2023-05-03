<?php
session_start();
?>
<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require 'vendor/autoload.php';

    $router = new AltoRouter();
    
    $router->setBasePath('/super-week');
    use SuperWeek\Controller\UserController;
    use SuperWeek\Controller\AuthController;
    use SuperWeek\Controller\BookController;
    use SuperWeek\Model\User;
    use SuperWeek\Model\Book;   
    
    
    // --------------------home-page-----------------------------


    $router->map( 'GET', '/', function() {
        require __DIR__ . '/src/View/home.php';
    });


    $router->map( 'GET', '/home', function() {
        require __DIR__ . '/src/View/home.php';
    });

    $router->map( 'GET', '/users', function() {
        $userController = new UserController();
        $success = $userController->displayUsers();
        echo $success;
    });


    $router->map( 'GET', '/users/fill', function() {
        echo "<h1>Page fill for add data in DB => users</h1>"; 
        for ($i = 0; $i < 6; $i++) {
            $userController = new UserController();
            $success = $userController->createUsers();
            echo $success;
        }
    });

    $router->map( 'GET', '/users/test', function() {
        echo "<h1>Test</h1>"; 
        $userController = new UserController();
        $success = $userController->testFaker();
    });

    $router->map( 'GET', '/users/[i:id]', function($id) {
        $userController = new UserController();
        $success = $userController->getUserInfo($id);
        echo $success;
    });


    //-----------------route for register-----------------------------

    $router->map( 'GET', '/register', function() {
        require __DIR__ . '/src/View/register.php';
    });


    $router->map( 'POST', '/register', function() {
        $email=htmlspecialchars($_POST["email"]);
        $first_name=htmlspecialchars($_POST["first_name"]);
        $last_name=htmlspecialchars($_POST["last_name"]);
        $password=htmlspecialchars($_POST["password"]);
        $checkPassword=htmlspecialchars($_POST["checkPassword"]);

        $authController = new AuthController();
        $success = $authController->register($email, $first_name, $last_name, $password, $checkPassword);
        echo $success;

    });

    //-----------------route for login-----------------------------

    $router->map( 'GET', '/login', function() {
        require __DIR__ . '/src/View/login.php';
    });

    $router->map( 'GET', '/logout', function() {
        $authController = new AuthController();
        $success = $authController->logout();
    });

    $router->map( 'POST', '/login', function() {
        $email=htmlspecialchars($_POST["email"]);
        $password=htmlspecialchars($_POST["password"]);
        $authController = new AuthController();
        $success = $authController->login($email, $password);
    });

    //-----------------route for register book and books-----------------------------


    $router->map( 'GET', '/books/write', function() {
        require __DIR__ . '/src/View/bookform.php';
    });

    $router->map( 'GET', '/books', function() {
        $bookController = new BookController();
        $success = $bookController->allBooks();
        echo $success;
    });

    $router->map( 'GET', '/books/[i:id]', function($id) {
        $bookController = new BookController();
        $success = $bookController->theBook($id);
        echo $success;
    });

    $router->map( 'POST', '/books/write', function() {
        $title=htmlspecialchars($_POST["title"]);
        $content=htmlspecialchars($_POST["content"]);
        $bookController = new BookController();
        $success = $bookController->registerBook($title, $content);
    });



    //-------------------------------------------------------------------
    


    // match current request url
    $match = $router->match();

    // call closure or throw 404 status
    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        // no route was matched
        header( $_SERVER["SERVER_PROTOCOL"] . ' 400 Not Found');
    }











?>