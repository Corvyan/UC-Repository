<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ConfirmUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(Post $post)
    {
        //dd($post);
        return view('lists.upload', [
            'post' => $post
        ]);
    }

    public function store(Post $post)
    {
        //dd($post);

        $post = Post::find($post->id);
        $post->validate_repository = 1;
        $post->save();

        return view('lists.upload', [
            'post' => $post
        ]);
    }
}
