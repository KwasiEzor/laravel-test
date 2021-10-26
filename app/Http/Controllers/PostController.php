<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        // $posts = Post::orderBy('title')->get();
        $posts = Post::all();
        return view('articles',compact('posts'));
    }
    public function show($id)
    {
        $posts = Post::all();
        // $post = $posts[$id] ?? 'Pas de titre';
        $post = Post::findOrFail($id);
        return view('article',[
            'post' => $post
        ]);
    }
    public function contact()
    {
        return view('contact');
    }
    public function create()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required | max:255 | min:5 |unique:posts',
            'content'=>'required |min:5'
        ]);
        Post::create([
            'title'=>$request->title,
            'content'=>$request->content
        ]);
        // dd('Post créé !!!');
    }

    public function register()
    {
        $post = Post::find(11);
        $video = Video::find(1);
        // dd($post , $video);

        $comment1 = new Comment(['content'=>'Mon premier commentaire','created_at'=>now()]);
        $comment2 = new Comment(['content'=>'Mon deuxième commentaire','created_at'=>now()]);
        // dd($comment1,$comment2);

        $post->comments()->saveMany([$comment1,$comment2]);

        $comment3 = new Comment(['content'=>'Mon troisième commentaire','created_at'=>now()]);
        $video->comments()->save($comment3);
    }
}
