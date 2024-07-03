<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'username' => 'required|min:3|max:20|unique:users',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::Create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
//        auth()->attempt([
//            'email' => $request->email,
//            'password' => $request->password,
//        ]);
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index');
    }
}

