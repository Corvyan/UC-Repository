@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <a href="" class="mb-2 font-bold">{{ $post->user->name }}</a><span class="text-gray-600
            text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span>

            <p class="mb-2 mt-1">{{ $post->body }}</p>

            <div class="flex items-center">
                @auth
                    @if ($post->validate_repository == 0)
                        <form action="{{ route('upload', $post) }}" method="post" 
                        class="mr-2">
                            @csrf
                            <button type="submit" class="text-blue-500">Confirm Upload</button>
                        </form>
                    @else
                        <p>Uploaded to Dspace</p>
                    @endif
                    
                @endauth
            </div>
            
        </div>
    </div>
@endsection