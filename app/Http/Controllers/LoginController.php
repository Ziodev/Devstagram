<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController extends Controller
{
    use ValidatesRequests;
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //regresar a la vista anterior con el mensaje de las credenciales incorrectas
        if (!auth()->attempt(request(['email', 'password']))){
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }
        return redirect()->route('posts.index');
    }

}
