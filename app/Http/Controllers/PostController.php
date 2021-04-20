<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'thesis' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $fileName = $request->file('thesis')->getClientOriginalName();
 
        $request->thesis->move(public_path('thesis'), $fileName);
        
        Post::create([
            'user_id' => auth()->user()->id,
            'body' => $request->body,
            'thesis_path' => $fileName
        ]);
        
        /////////////////////////////////////////////////////////////////////

        // BELOW IS FOR UPLOADING IMAGE

        /////////////////////////////////////////////////////////////////////
        //dd(auth()->user()->id);
        
        // $this->validate($request, [
        //     'body' => 'required',
        //     'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        // ]);

        // //$request->user()->posts()->create($request->only('body'));

        // $newImageName = time() . '-' . $request->name . '.' .
        // $request->image->extension();

        // $request->image->move(public_path('images'), $newImageName);
        
        // Post::create([
        //     'user_id' => auth()->user()->id,
        //     'body' => $request->body,
        //     'image_path' => $newImageName
        // ]);

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        
        return back();
    }
}
