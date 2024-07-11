@extends('layouts.app')

@section('title')
Creando una nueva publicacion
@endsection

@section('content')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        imagen aqui
    </div>
    <div class="md:w-1/2 p-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-10">
        <form action="{{ route('register') }}" method="POST">

            @csrf

            <div class="mb-5">
                <label for="titulo" id="titulo" class="mb-2 uppercase text-gray-500 font-bold">
                    Titulo
                </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo de la publicacion" class="border p-3 w-full rounded-lg
                     @error('titulo') border-red-500 @enderror" value="{{ old('titulo') }}">

                @error('titulo')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" id="descripcion" class="mb-2 uppercase text-gray-500 font-bold">
                    Descripcion
                </label>
                <input type="textarea" id="titulo" name="descripcion" placeholder="Descripcion de la publicacion" class="border p-3 w-full rounded-lg
                     @error('descripcion') border-red-500 @enderror" value="{{ old('descripcion') }}">

                @error('descripcion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
        </form>
    </div>
</div>
@endsection
