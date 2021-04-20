@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div>
                <h1 class="text-2xl font-medium mb-4">Approved Thesis</h1>
            </div>
            @if ($posts->count())
                @foreach ($posts as $post)
                    @if ($post->validate == 1)
                        @if ($post->validate_repository == 0)
                            <div class="mt-6">
                                <a href="{{ route('users.posts', $post->user) }}" class="mb-2 font-bold">{{ $post->user->name }}</a><span class="text-gray-600
                                text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span>
                        
                                <p class="mb-2 mt-1">{{ $post->body }}</p>
                                <p>{{ Str::plural('comment', $posts->count()) }} : </p>
                                <p class="mb-2 mt-1">{{ $post->comment }}</p>

                                
                                <a href="{{ route('upload', $post) }}" class="mr-2 text-blue-500">Upload to Dspace</a>
                                <a href="{{ route('cancel', $post) }}" class="mr-2 text-blue-500">Cancel</a>
                                
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
@endsection`