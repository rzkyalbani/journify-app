{{-- @dd($posts[1]->user->name); --}}
@extends('layouts.main')

@section('content')
    @include('components.navbar')
    <div class="px-16 mt-12 grid grid-cols-7">
        @if (session('deleteSuccess'))
            <span class="col-span-3 col-start-3 bg-red-500 text-white p-3 rounded-sm mb-8">
                Post has been deleted
            </span>
        @endif
        @if (!Request::is('posts/' . Auth::user()->username))
            <div class="col-start-2 col-span-5 text-center mt-28">
                <h1 class="text-3xl font-semibold text-neutral-400">Unfortunately you can't see other people's posts :(</h1>
            </div>
        @else
            @foreach ($posts as $post)
                <div class="col-start-3 col-span-3">
                    <div class="col-span-2 p-2">
                        <div class="flex gap-x-3 items-center">
                            <div class="flex flex-col gap-y-1">
                                <span class="flex gap-x-2 items-center">
                                    <img src="{{ asset('storage/' . $post->user->profile_picture) }}" width="20"
                                        height="20" class="rounded-full">
                                    <p class="text-xs font-medium">{{ $post->user->name }} <span
                                            class="font-normal">in</span>
                                        {{ $post->category->name }}</p>
                                </span>
                                <h1 class="font-bold text-xl">{{ $post->title }}</h1>
                                <p class="text-gray-600 text-sm font-light">
                                    {{ $post->excerpt() }}
                                </p>
                                <small class="text-xs font-extralight mt-3 flex justify-between items-center">
                                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                                    <span class="px-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width=".5" stroke="currentColor" class="w-5 h-5 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        {{ $post->total_likes }}
                                    </span>
                                </small>
                            </div>
                            <img src="{{ asset('storage/' . $post->image) }}" width="250">
                        </div>
                        <div class="mb-12 mt-5 flex items-center justify-end gap-x-3 jsu">
                            <a href="/posts/{{ $post->slug }}/edit" class="px-3 py-1 bg-yellow-500 text-white rounded-sm text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                Edit
                            </a>
                            <form action="/posts/{{ $post->slug }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure want to delete this post?')"
                                    class="px-3 py-1 bg-red-600 text-white rounded-sm text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Delete
                                </button type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
