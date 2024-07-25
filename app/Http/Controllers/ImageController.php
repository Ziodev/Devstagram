<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Laravel\Facades\Image;


class ImageController extends Controller
{
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();
        // Cargar la imagen usando el controlador GD predeterminado
        $imagenServidor = $manager->read($imagen);
        $imagenServidor = $imagenServidor->blur(7);
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
