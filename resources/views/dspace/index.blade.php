@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div>
                <h1 class="text-2xl font-medium mb-1">Dspace</h1>
            </div>
            
            @if ($posts->count())
                @foreach ($posts as $post)
                    @if ($post->validate == 1)
                        @if ($post->validate_repository == 1)
                            <div class="mt-4">
                                <a href="{{ route('users.posts', $post->user) }}" class="mb-2 font-bold">{{ $post->user->name }}</a><span class="text-gray-600
                                text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span>
                        
                                <p class="mb-2 mt-1">{{ $post->body }}</p>
                                
                            </div>
                        @else
                            
                        @endif
                        
                    @else
                    @endif
                         
                @endforeach

                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif
            
        </div>
    </div>
@endsection