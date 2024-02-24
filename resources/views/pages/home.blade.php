@extends('layouts.main')

@section('content')
    @include('components.navbar')
    <div class="px-16 mt-12 grid grid-cols-4">
        <div class="col-span-1 py-2 px-8">
            @include('components.sidebar')
        </div>
        <div class="col-span-2 p-2">
            @foreach ($posts as $post)
                <div class="flex gap-x-3 items-center mb-12">
                    <div class="flex flex-col gap-y-1">
                        <span class="flex gap-x-2 items-center">
                            <img src="{{ asset('storage/' . $post->user->profile_picture) }}" width="20" height="20"
                                class="rounded-full">
                            <p class="text-xs font-medium">{{ $post->user->name }} <span class="font-normal">in</span>
                                {{ $post->category->name }}</p>
                        </span>
                        <h1 class="font-bold text-xl text-blue-400 hover:text-blue-600">
                            <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                        </h1>
                        <p class="text-gray-600 text-sm font-light">
                            {{ $post->excerpt() }}
                        </p>
                        <small class="text-xs font-extralight mt-3 flex justify-between items-center">
                            <span>{{ $post->updated_at ? $post->updated_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                            <span class="px-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=".5"
                                    stroke="currentColor" class="w-5 h-5 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                {{ $post->total_likes }}
                            </span>
                        </small>
                    </div>
                    <img src="{{ asset('storage/' . $post->image ) }}" width="250">
                </div>
            @endforeach
        </div>
    </div>
@endsection
