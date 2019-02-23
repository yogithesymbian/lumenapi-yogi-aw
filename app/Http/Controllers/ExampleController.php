<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
}
