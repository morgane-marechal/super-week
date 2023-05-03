<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require 'vendor/autoload.php';

    $router = new AltoRouter();
    
    $router->setBasePath('/super-week');
    use SuperWeek\Controller\UserController;
    use SuperWeek\Controller\AuthController;
    use SuperWeek\Model\User;    

    $router->map( 'GET', '/', function() {
        require __DIR__ . '/src/View/home.php';
    });


    $router->map( 'GET', '/home', function() {
        require __DIR__ . '/src/View/home.php';
    });

    $router->map( 'GET', '/users', function() {
        echo "<h1>Bienvenu sur la page des utilisateurs</h1>";
        $userController = new UserController();
        $success = $userController->displayUsers();
        var_dump($success);
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
        echo "<h1>Bienvenu sur la page des utilisateurs ".$id."</h1>";
        $userController = new UserController();
        $success = $userController->getUserInfo($id);
        var_dump($success);
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

    $router->map( 'POST', '/login', function() {
        $email=htmlspecialchars($_POST["email"]);
        $password=htmlspecialchars($_POST["password"]);
        $authController = new AuthController();
        $success = $authController->login($email, $password);
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