@extends('layouts.main')

@section('content')
    @include('components.navbar')
    <div class="px-16 mt-16 grid grid-cols-8">
        <div class="col-start-3 col-span-4 flex flex-col gap-y-3">
            <h1 class="font-bold text-3xl">{{ $post->title }}</h1>
            <div class="flex items-center gap-x-3 mt-3 border-y py-4 border-gray-300 relative">
                <img src="{{ asset('storage/' . $post->user->profile_picture) }}" width="35" height="35"
                    class="rounded-full" />
                <div class="flex flex-col text-xs">
                    <span>{{ $post->user->name }}</span>
                    <span>Published in
                        <a href="/categories/{{ $post->category->slug }}"
                            class="font-light text-gray-500 hover:text-gray-800 underline">{{ $post->category->name }}</a> &centerdot;
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </span>
                </div>
                <button type="button" class="absolute right-0" id="like-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6" id="like-svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                </button>
            </div>
            <div>
              <img src="{{ asset('storage/' . $post->image) }}" alt="post-picture" class="w-full my-4">
            </div>
            <div class="text-gray-700">
                {!! $post->body !!}
            </div>
            <a href="/" class="text-blue-500 my-8 hover:text-blue-800 text-right">
              <span><- Back to Home</span>
            </a>
        </div>
    </div>
@endsection
