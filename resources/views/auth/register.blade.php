@extends('layouts.app')

@section('title')
    Registrate
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
        <div class="md:w-6/12">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form>
                <div class="mb-5">
                    <label for="name" id="name" class="mb-2 uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="username" id="username" class="mb-2 uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input type="text" id="username" name="username" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="email" id="email" class="mb-2 uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input type="email" id="username" name="email" placeholder="Tu Email de Registro" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password" id="password" class="mb-2 uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Password de Registro" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" id="password_confirmation" class="mb-2 uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu Password" class="border p-3 w-full rounded-lg">
                </div>
                <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full rounded-lg p-3 text-white">
            </form>
        </div>
    </div>
@endsection
