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