<?php

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

$router->get('/', function () use ($router) 
{
    return $router->app->version();
});

$router->get('/key', function ()
{
    return str_random(32);
});

$router->get('/foo', function ()
{
    return 'Hello, GET Method!';
});

$router->post('/bar', function ()
{
    return 'Hello, POST Method!';
});

// The router allow you to register routes that respond to any HTTP verb:
// Lumen Framework API Tutorial - 02 Lumen Route - Membuat URL atau API Endpoint dengan Method HTTP
$router->get('/get', function ()
{
    return 'GET';
});

$router->post('/post', function ()
{
    return 'POST';
});
$router->put('/put', function ()
{
    return 'PUT';
});

$router->patch('/patch', function ()
{
    return 'PATCH';
});
$router->delete('/delete', function ()
{
    return 'DELETE';
});

$router->options('/options', function ()
{
    return 'OPTIONS';
});

//Basic Route Parameter Dinamis
//Lumen Framework API Tutorial - 03 Lumen Route - Memberikan Parameter Dinamis pada URI
$router->get('user/{id}', function ($id)
{
    return 'User id = ' . $id;
});

$router->get('post/{postId}/comments/{commentsId}', function ($postId, $commentsId)
{
    return 'postId = ' . $postId . ' commentsId = ' . $commentsId;
});

//Optional Route Parameter
$router->get('optional[/{param}]', function ($param = null)
{
    return $param;
});

//Lumen Framework API Tutorial - 04 Lumen Route - Memberikan Nama Alias Pada Route
$router->get('profile', function ()
{
    return redirect()->route('route.profile');
});

$router->get('profile/awyogi', ['as' => 'route.profile', function ()
{
    // return route('route.profile');
    return 'Route Alias Name';
}]);

$router->group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => ''], function () use ($router)
{
    $router->get('home', function ()
    {
        return 'Home Admin';
    });
    $router->get('profile', function ()
    {
        return 'Profile Admin';
    });
});