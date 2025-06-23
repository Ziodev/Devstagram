@extends('layouts.app')
@section('title')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="post" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" id="username" class="mb-2 uppercase text-gray-500 font-bold">
                        Username
                    </label>

                    <input type="text" id="username" name="username" placeholder="Tu Nombre de usuario"
                        class="border p-3 w-full rounded-lg
                     @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" id="imagen" class="mb-2 uppercase text-gray-500 font-bold">
                        Imagen de Perfil
                    </label>

                    <input type="file" id="imagen" name="imagen" class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png">
                </div>

                <div class="mb-5">
                    <label for="email" id="email" class="mb-2 uppercase text-gray-500 font-bold">
                        Email
                    </label>

                    <input type="text" id="email" name="email" placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg
                     @error('email') border-red-500 @enderror"
                        value="{{ auth()->user()->email }}">

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="current_password" id="current_password" class="mb-2 uppercase text-gray-500 font-bold">
                        Contraseña Actual
                    </label>
                    <input type="password" id="current_password" name="current_password" placeholder="Tu Contraseña Actual"
                        class="border p-3 w-full rounded-lg
               @error('current_password') border-red-500 @enderror">
                    @error('current_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="new_password" id="new_password" class="mb-2 uppercase text-gray-500 font-bold">
                        Nueva Contraseña
                    </label>
                    <input type="password" id="new_password" name="new_password" placeholder="Tu Nueva Contraseña"
                        class="border p-3 w-full rounded-lg
               @error('new_password') border-red-500 @enderror">
                    @error('new_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="new_password_confirmation" id="new_password_confirmation"
                        class="mb-2 uppercase text-gray-500 font-bold">
                        Confirmar Nueva Contraseña
                    </label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                        placeholder="Confirma tu Nueva Contraseña"
                        class="border p-3 w-full rounded-lg
               @error('new_password_confirmation') border-red-500 @enderror">
                    @error('new_password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>


                <input type="submit" value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full rounded-lg p-3 text-white">
            </form>
        </div>
    </div>
@endsection
