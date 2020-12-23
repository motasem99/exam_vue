<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index () {
        return view('welcome');
    }

    public function getData() {
        $users = User::all();
        return response()->json(compact('users'));
    }
}
