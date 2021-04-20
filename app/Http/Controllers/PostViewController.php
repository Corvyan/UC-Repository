<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostViewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function show(Post $post)
    {
        return view('posts.view', [
            'post' => $post
        ]);
    }

    public function store(Post $post)
    {
        //dd($post);
        if($post->validate == 0) // APPROVE
        {
            $post = Post::find($post->id);
            $post->validate = 1;
            $post->comment = "";
            $post->save();
        }else if($post->validate == 1) // DISAPPROVE
        {  
            $post = Post::find($post->id);
            $post->validate = 0;
            $post->comment = "";
            $post->save();
        }

        return view('posts.view', [
            'post' => $post
        ]);
    }

    // public function upload(Post $post)
    // {
    //     //dd($post);
    //     $post = Post::find($post->id);
    //     $post->validate_repository = 1;
    //     $post->save();

    //     return view('posts.view', [
    //         'post' => $post
    //     ]);
    // }
}
