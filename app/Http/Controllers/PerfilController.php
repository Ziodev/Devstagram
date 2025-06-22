<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }
    public function store(Request $request)
    {
        $request->request->add(['username' => \Str::slug($request->username)]);
        $this->validate($request, [
            'username' => [
                'required',
                'min:3',
                'max:20',
                'unique:users,username,' . auth()->user()->id,
                'not_in:admin,usuario,editar-perfil',
            ],
            'email' => [
                'required',
                'email',
                'max:50',
                'unique:users,email,' . auth()->user()->id,
            ],
            'current_password' => $request->filled('new_password') ? ['required', 'current_password'] : ['nullable'],
            'new_password' => $request->filled('new_password') ? ['required', 'min:6', 'confirmed'] : ['nullable'],

            ]);


        if($request->imagen){
            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . '.' . $imagen->extension();
            // Cargar la imagen usando el controlador GD predeterminado
            $imagenServidor = $manager->read($imagen);
            $imagenServidor = $imagenServidor->blur(7);
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->password = $request->password ? bcrypt($request->password) : auth()->user()->password;
        $usuario->imagen = $request->imagen ? $nombreImagen : auth()->user()->imagen;

        //Guardar los cambios en el usuario
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username)->with('mensaje', 'Perfil actualizado correctamente');


    }
}
