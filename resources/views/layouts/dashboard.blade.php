@extends('layouts.app')


@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex items-center md:flex-row">

            <div class="md:w-8/12  lg:w-6/12 px-5">
               <img src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/user.svg') }}" alt="imagen usuario"
                    class="rounded-full w-40 h-40 object-cover mx-auto md:mx-0">

            </div>

            <div
                class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:items-start text-center md:text-left">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl">{{$user->username }}</p>
                    @auth
                        @if($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index', $user ) }}"
                               class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                                </svg>

                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mb-2 mt-2 font-bold">
                    {{$user->followers()->count()}}
                    <span class="font-normal"> @choice('Seguidor | Seguidores',$user->followers()->count() ) </span>
                </p>

                <p class="text-gray-800 text-sm mb-2 font-bold">
                    {{$user->followings()->count()}}
                    <span class="font-normal"> Siguiendo </span>
                </p>
                <p class="text-gray-800 text-sm mb-2 font-bold">
                    {{ $user->posts->count() }}
                    <span class="font-normal"> Posts </span>
                </p>
                @auth
                    @if($user->id !== auth()->user()->id)
                        @if(!$user->siguiendo(auth()->user()))
                <form action="{{ route('users.follow', $user) }}" method="POST">
                    @csrf
                    <input
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition-colors duration-300 text-xs"
                    value="Seguir"
                    />
                </form>
                        @else
                    <form action="{{ route('users.unfollow', $user) }}" method="POST">
                    @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            class=" bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition-colors duration-300 text-xs"
                            value="Dejar de seguir"
                        />
                    </form>
                        @endif
                    @endif
                @endauth
            </div>



        </div>
    </div>
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        {{--        {{ dd($user->$posts) }}--}}
        @if($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($posts as $post)
                    <div class="">
                        <a href="{{ route('posts.show', ['post'=> $post, 'user'=> $user  ]) }}">
                            <img src="{{asset('uploads'). '/' . $post->image}}" alt="Imagen del post {{$post->titulo}}"
                                 class="w-full h-64 object-cover rounded-lg transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-10">
                {{$posts->links('pagination::tailwind')}}
            </div>
        @else
            <p class="text-gray-600 uppercase text text-sm text-center font-bold">No hay posts</p>
        @endif
    </section>
@endsection
