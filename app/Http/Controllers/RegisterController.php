<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


class RegisterController extends Controller
{
    use ValidatesRequests;
    public function index(){
        return view('auth.register');
    }

public function store( Request $request){
    $this->validate($request, [
        'name' => 'required|string|max:30',
        'username' => 'required|string|min:3|max:20|unique:users',
        'email' => 'required|email|unique:users|max:50',
        'password' => 'required|string|min:6|confirmed',
    ]);
    }


}

