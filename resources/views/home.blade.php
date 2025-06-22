@extends('layouts.app')

@section('title')
    Pagina principal
@endsection

@section('content')

    @if($posts)

     <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
         @foreach($posts as $post)
             <div class="">
                 <a href="{{ route('posts.show', ['post'=> $post, 'user'=> $post->user]) }}">
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
        <p class="text-center"> No hay posts, sigue a alguien para tener contenido</p>
    @endif

@endsection
