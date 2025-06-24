<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(8);

        return view('layouts.dashboard',
            ['user' => $user,
                'posts' => $posts
            ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'image' => 'required'
        ]);

//        Post::create([
//
//            'titulo' => $request->titulo,
//            'descripcion' => $request->descripcion,
//            'image'=> $request->image,
//            'user_id' => Auth()->user()->id,
//        ]);
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'image' => $request->image,
            'user_id' => Auth()->user()->id,
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user'=> $user,
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        if ($post->image) {
            $imagePath = public_path('uploads/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
