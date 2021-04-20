<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CancelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(Post $post)
    {
        //dd($post);

        return view('lists.cancel', [
            'post' => $post
        ]);
    }

    public function store(Post $post, Request $request)
    {
        //dd($post->id);
        $post = Post::find($post->id);
        $post->comment = $request->comment;
        $post->validate = 0;
        $post->save();
        
        return view('lists.cancel', [
            'post' => $post
        ]);
    }
}
