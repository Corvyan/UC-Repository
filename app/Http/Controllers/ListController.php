<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(Post $post)
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        return view('lists.index', [
            'posts' => $posts
        ]);
    }

}
