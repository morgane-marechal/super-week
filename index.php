<?php

    require 'vendor/autoload.php';
    
    $router = new AltoRouter();
    
    $router->setBasePath('/super-week');


    $router->map( 'GET', '/', function() {
        require __DIR__ . '/views/home.php';
    });


    $router->map( 'GET', '/home', function() {
        require __DIR__ . '/views/home.php';
    });

    $router->map( 'GET', '/users', function() {
        echo "<h1>Bienvenu sur la page des utilisateurs</h1>";
    });

    $router->map( 'GET', '/users/[i:id]', function($id) {
        echo "<h1>Bienvenu sur la page des utilisateurs ".$id."</h1>";
    });


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