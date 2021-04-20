@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <a href="" class="mb-2 font-bold">{{ $post->user->name }}</a><span class="text-gray-600
            text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span>

            <p class="mb-2 mt-1">{{ $post->body }}</p>

            <p class="mb-1 mt-8">Uploaded Files : </p>
            
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                Halaman Judul
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                Halaman Pernyataan Keaslian
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                Kata Pengantar
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                Abstrak
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                Daftar Isi, Daftar Tabel, Daftar Gambar, Daftar Lampiran
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                BAB I
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                BAB II
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                BAB III
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                BAB IV
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                BAB V
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                BAB VI
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                Daftar Pustaka
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                Lampiran
            </a>
            <br>
            <a href="{{ asset('thesis/' . $post->thesis_path) }}"
            class="mr-2 text-blue-500">
                Journal / Artikel
            </a>


            <br>

            <div class="mt-8 flex items-center">
                @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Delete</button>
                </form>
                @endcan

                @auth
                    @if(auth()->user()->role == "2")
                        @if ($post->validate_repository == 0)
                            @if ($post->validate == 0)
                                <form action="{{ route('posts.view', $post) }}" method="post" 
                                class="mr-2">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Approve</button>
                                </form>
                        
                            @else
                                <form action="{{ route('posts.view', $post) }}" method="post" 
                                class="mr-2">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Disapprove</button>
                                </form>
                            
                            @endif

                        @else
                            <p>This post has been uploaded to Dspace</p>
                        @endif
                    @endif
                    

                @endauth
            </div>

            @if ($post->validate == 1)
                <p>This thesis has been approved by a Lecturer</p>
            @else
                <p>This thesis has NOT been approved by a Lecturer</p>
            @endif
            
        </div>
    </div>
@endsection