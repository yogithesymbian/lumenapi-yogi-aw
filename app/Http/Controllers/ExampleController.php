<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use \Illuminate\Http\Response;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Lumen Framework API Tutorial - 10 Lumen Controller  -  Implementasi Middleware pada Controller
        $this->middleware('age', ['only' => ['getUser']]);
        // $this->middleware('age', ['except' => ['getUser']]);
    }

    public function generateKey()
    {
        return str_random(32);
    }
    public function yogiPost()
    {
        return 'Example controller from POST Request';
    }
    public function getUser($id)
    {
        return 'userId = ' . $id;
    }
    public function getPost($cat1, $cat2)
    {
        return 'Post category = ' . $cat1 . ' Selanjutnya category = ' . $cat2;
    }
    public function getProfile()
    {
        // return 'Route Profile Action : ' . route('profile.action');
        echo '<a href="' . route('profile.action') . '">Profile Action</a>';
    }
    public function getProfileAction()
    {
        return 'Route Profile : ' . route('profile');
    }
    public function fooBar(Request $request)
    {

        // if ($request->is('foo/phbar'))
        // {
        //     return 'success';
        // }
        // else
        // {
        //     return 'wrong';
        // }
        // return $request->path();
        return $request->method();
    }

    // Lumen Framework API Tutorial - 12 Lumen Request  - Mengambil Nilai Input Menggunakan Request
    public function userProfile(Request $request)
    {
        // return $request->name;

        // $user['name'] = $request->name;
        // $user['username'] = $request->username;
        // $user['email'] = $request->email;
        // $user['password'] = $request->password;

        // return $user;

        // return $request->all();

        // return $request->input('name', 'null');
        // $user['name'] = $request->input('name', 'null');
        // return $user;

        // if ($request->has(['name', 'email'])) //we can use too with filled method for check value ada atau tidak
        // {
        //     return 'success';
        // }
        // else
        // {
        //     return 'wrong';
        // }

        return $request->only(['name', 'password']); //except for (kecuali)
    }

    // Lumen Framework API Tutorial - 13 Menampilkan Response dari suatu Request - Lumen Response
    public function response()
    {
        // return (new Response('Data Successfully Created!', 201))
        // ->header('Content-Type', 'application/json');

        // $data['status'] = 'Success';
        // return (new Response($data, 201))
        //         ->header('Content-Type', 'application/json');

        return response()->json([
            'message' => 'File not found!',
            'status'  => false
        ], 404);
    }
}
