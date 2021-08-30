<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->post('/createWithList', ['uses' => 'UserController@createWithList']);
$router->get('/{username}', ['uses' => 'UserController@getByUsername']);
$router->put('/{username}', ['uses' => 'UserController@update']);
$router->delete('/{username}', ['uses' => 'UserController@delete']);
$router->get('/login', ['uses' => 'UserController@login']);
$router->get('/logout', ['uses' => 'UserController@logout']);
$router->post('/createWithArray', ['uses' => 'UserController@createWithArray']);
$router->post('/', ['uses' => 'UserController@createUser']);
