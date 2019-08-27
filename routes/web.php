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

$router->get('/', function () use ($router) {
    return $router->app->version();
});



// $router->get('/key', function ()
// {
//     return str_random(32);
// });



$router->get('/foo', function () {
    return 'Hello, GET Method!';
});

$router->post('/bar', function () {
    return 'Hello, POST Method!';
});

// The router allow you to register routes that respond to any HTTP verb:
// Lumen Framework API Tutorial - 02 Lumen Route - Membuat URL atau API Endpoint dengan Method HTTP
$router->get('/get', function () {
    return 'GET';
});

// $router->post('/post', function ()
// {
//     return 'POST';
// });
$router->put('/put', function () {
    return 'PUT';
});

$router->patch('/patch', function () {
    return 'PATCH';
});
$router->delete('/delete', function () {
    return 'DELETE';
});

$router->options('/options', function () {
    return 'OPTIONS';
});

//Basic Route Parameter Dinamis

//Lumen Framework API Tutorial - 03 Lumen Route - Memberikan Parameter Dinamis pada URI
// $router->get('user/{id}', function ($id)
// {
//     return 'User id = ' . $id;
// });

$router->get('/post/{postId}/comments/{commentsId}', function ($postId, $commentsId) {
    return 'postId = ' . $postId . ' commentsId = ' . $commentsId;
});

//Optional Route Parameter
$router->get('/optional[/{param}]', function ($param = null) {
    return $param;
});

//Lumen Framework API Tutorial - 04 Lumen Route - Memberikan Nama Alias Pada Route
// $router->get('profile', function ()
// {
//     return redirect()->route('route.profile');
// });

// $router->get('profile/awyogi', ['as' => 'route.profile', function ()
// {
//     // return route('route.profile');
//     return 'Route Alias Name';
// }]);

// Lumen Framework API Tutorial - 05 Lumen Route - Mengelompokkan Route dengan Method Group
$router->group(['prefix' => '/admin'], function () use ($router) {
    $router->get('/', function () {
        return null;
    });
    // Lumen Framework API Tutorial - 06 Lumen Middleware  -  Menggunakan Middleware pada Route
    $router->get('/home', ['middleware' => 'age', function () {
        return 'old Enough';
    }]);
    $router->get('/profile', function () {
        return 'Profile Admin';
    });
});
// Lumen Framework API Tutorial - 06 Lumen Middleware  -  Menggunakan Middleware pada Route
$router->get('/fail', function () {
    return 'not yet mature';
});

// Lumen Framework API Tutorial - 07 Lumen Controller  -  Menggunakan Controller pada Route
$router->get('/key', 'ExampleController@generateKey');

$router->post('/yogi', 'ExampleController@yogiPost');


// Lumen Framework API Tutorial - 08 Lumen Controller  -  Menggunakan Paramater dalam Controller
// $router->get('/user/{id}', 'ExampleController@getUser');

$router->get('/post/cat1/{cat1}/cat2/{cat2}', 'ExampleController@getPost');

// Lumen Framework API Tutorial - 09 Lumen Controller  -  Menggunakan Named Route pada Controller

$router->get('/profile', ['as' => 'profile', 'uses' => 'ExampleController@getProfile']);
$router->get('/profileAction', ['as' => 'profile.action', 'uses' => 'ExampleController@getProfileAction']);

// Lumen Framework API Tutorial - 10 Lumen Controller  -  Implementasi Middleware pada Controller
// this in ExampleController.php

// Lumen Framework API Tutorial - 11 Lumen Request  -  Menggunakan Request Handler pada Controller
$router->get('foo/bar', 'ExampleController@fooBar');
$router->post('bar/foo', 'ExampleController@fooBar');

// Lumen Framework API Tutorial - 12 Lumen Request  - Mengambil Nilai Input Menggunakan Request
$router->post('/user/profile', 'ExampleController@userProfile');

// Lumen Framework API Tutorial - 13 Menampilkan Response dari suatu Request - Lumen Response
$router->get('/response', 'ExampleController@response');

// Lumen Framework API Tutorial - 14 Menggunakan Authentication pada Framework Lumen
$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');

$router->get('/user/{id}', 'UserController@show');
$router->get('/tesyogi', 'UserController@showtest');
