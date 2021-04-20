@props(['post' => $post])

<div class="mt-4">
        <a href="{{ route('users.posts', $post->user) }}" class="mb-2 font-bold">{{ $post->user->name }}</a><span class="text-gray-600
        text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span>

        <p class="mb-2 mt-1">{{ $post->body }}</p>
        
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        @endcan
        
        <div class="flex items-center">
            @auth
                {{-- @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('posts.likes', $post) }}" method="post" 
                    class="mr-2">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                @else
                    <form action="{{ route('posts.likes', $post) }}" method="post" 
                    class="mr-1">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form>
                @endif --}}
    
                <a href="{{ route('posts.view', $post) }}" class="mr-2 text-blue-500">View</a>
            @endauth

            {{-- <span>{{ $post->likes->count() }} {{ Str::plural('like', 
            $post->likes->count()) }}</span> --}}

            
        </div>


        {{-- @if ($post->validate == 1)   
            <p>This post has been validated</p>
        @else
            
        @endif

        @if ($post->validate_repository == 1)
            <p>This post has been uploaded to Dspace</p>
        @else
        @endif --}}

</div>
