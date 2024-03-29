<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except(['show', 'index']);
    }

    public function index(User $user)
    {
        $posts = Post::where("user_id", $user->id)->paginate(20);

        return view("dashboard", [
            "user" => $user,
            "posts" => $posts
        ]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "titulo" => "required|max:255",
            'descripcion' => "required|max:255",
            "imagen" => "required",
        ]);

        // Post::create([
        //     "titulo" => $request->titulo,
        //     "descripcion" => $request->descripcion,
        //     "imagen" => $request->imagen,
        //     "user_id" => auth()->user()->id,
        // ]);

        $request->user()->posts()->create([
            "titulo" => $request->titulo,
            "descripcion" => $request->descripcion,
            "imagen" => $request->imagen,
            "user_id" => auth()->user()->id,
        ]);

        return redirect()->route("posts.index", auth()->user()->username)->with("success", "");
    }

    public function show(User $user, Post $post)
    {
        return view("posts.show", [
            'post' => $post,
            'user' => $user,
        ]);
    }
}
