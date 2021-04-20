@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <a href="{{ route('users.posts', $post->user) }}" class="mb-2 font-bold">{{ $post->user->name }}</a><span class="text-gray-600
            text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span>

            <p class="mb-2 mt-1">{{ $post->body }}</p>
            <br>
            <p>Your Comment : </p>
            <p class="mb-2 mt-1">{{ $post->comment }}</p>

            <div class="flex items-center">
                @auth
                <form action="{{ route('cancel', $post) }}" method="post" mb-4>
                    @csrf
                    <div class="mb-4">
                        <label for="comment" class="sr-only">Comment</label>
                        <textarea name="comment" id="comment" cols="60" rows="4" class="bg-gray-100
                        border-2 w-full mt-4 p-4 rounded-lg @error('comment') border-red-500 @enderror"
                        placeholder="Your Comment ..."></textarea>
                        
                    </div>

                    @error('comment')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <div>
                        <button type="submit" class="bg-blue-500 mt-4 mb-4 text-white px-4 py-2 rounded
                        font-medium">Post</button>
                    </div>

                </form>
                    
                @endauth
            </div>
            
        </div>
    </div>
@endsection