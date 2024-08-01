@extends('layouts.app')

@section('title')
    Creando una nueva publicacion
@endsection
@push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('images.store')  }}" method="POST" id="dropzone" class="dropzone border-dashed border-2 w-full h-96
        rounded flex flex-col justify-center items-center" enctype="multipart/form-data">
                @csrf
            </form>

        </div>
        <div class="md:w-1/2 p-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-10">
            <form action="{{ route('posts.store') }}" method="POST">

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
                    <textarea id="titulo" name="descripcion" placeholder="Descripcion de la publicacion" class="border p-3 w-full rounded-lg
                     @error('descripcion') border-red-500 @enderror"></textarea>

                    @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden"
                           name="image"
                           id="image"
                           value="{{old('image')}}"
                    >
                    @error('image')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Crear publicacion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full rounded-lg p-3 text-white">
            </form>
        </div>
    </div>
@endsection
