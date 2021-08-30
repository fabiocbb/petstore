<?php

//use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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


$router->post('/{petId}/uploadImage', ['uses' => 'PetController@uploadImage']);
$router->post('/', ['uses' => 'PetController@create']);
$router->put('/', ['uses' => 'PetController@update']);
$router->post('/{petId}', ['uses' => 'PetController@updateInvalid']);

$router->get('/findByStatus',  ['uses' => 'PetController@getByStatus']);
//$router->get('/findByStatus', 'PetController@getByStatus');
$router->get('/findByTags',  ['uses' => 'PetController@getByTags']); //deprecated
$router->get('/{petId}', ['uses' => 'PetController@getById']);
$router->get('/', ['uses' => 'PetController@getAll']);

$router->delete('/{petId}', ['uses' => 'PetController@delete']);
