@extends('layouts.app')

@section('title')
    inicia sesion en Devstagram
@endsection

@section('content')
    @guest()
    <div class="md:flex md:justify-center md:gap-10 md:items-center p-5">
        <div class="md:w-6/12">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">

            <form method="Post" action="{{route('login')}}">

                @csrf
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" id="email" class="mb-2 uppercase text-gray-500 font-bold">
                        Email
                    </label>

                    <input type="email" id="username" name="email" placeholder="Tu Email de Registro" class="border p-3 w-full rounded-lg
                     @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" id="password" class="mb-2 uppercase text-gray-500 font-bold">
                        Password
                    </label>

                    <input type="password" id="password" name="password" placeholder="Password de Registro" class="border p-3 w-full rounded-lg
                     @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" class=""> <label class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar sesion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full rounded-lg p-3 text-white">

            </form>
        </div>
    </div>
    @endguest

    @auth()
        {{route('layouts.dashboard')}}
    @endauth
@endsection
