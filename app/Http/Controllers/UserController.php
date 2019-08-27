<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'User Found!',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User Not Found!',
                'data' => ''
            ], 404);
        }
    }
    public function showtest()
    {
        // $user = User::all();
        // $user = DB::table('users')->get();
        $user = DB::select('select * from users');
        if (!$user) {
            # code...
            return response()->json([
                'status' => false,
                'message' => 'User Not Found',
                'data' => null
            ], 401);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'User Found',
                'data' => $user
            ], 201);
        }
    }
}
