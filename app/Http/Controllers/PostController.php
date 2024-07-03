<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Asegúrate de usar esta importación para Request
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PostController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.dashboard');
    }
}
