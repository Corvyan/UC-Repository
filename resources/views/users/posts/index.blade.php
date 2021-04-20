@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div>
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg mt-6">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="mt-4">
                                <a href="{{ route('users.posts', $post->user) }}" class="mb-2 font-bold">{{ $post->user->name }}</a><span class="text-gray-600
                                text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span>
                        
                                <p class="mb-2 mt-1">{{ $post->body }}</p>

                                <p>{{ $posts->count() }} {{ Str::plural('comment', $posts->count()) }} : </p>
                                <p class="mb-2 mt-1">{{ $post->comment }}</p>
                                
                                @can('delete', $post)
                                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">Delete</button>
                                    </form>
                                @endcan
                                
                                <div class="flex items-center">
                                    @auth
                                    <a href="{{ route('posts.view', $post) }}" class="mr-2 text-blue-500">View</a>        
                                    @endauth
                        
                                    
                        
                                    
                                </div>
                        
                        </div>                    
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>{{ $user->name }} does not have any post</p>
                @endif
            </div>  
        </div>
    </div>
@endsection