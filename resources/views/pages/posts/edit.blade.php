@extends('layouts.main')

@section('content')
    @include('components.navbar')
    <div class="px-16 mt-12 grid grid-cols-8">
        <div class="col-start-3 col-span-4">
            <h3 class="mb-5 text-3xl font-semibold">Edit Post</h3>
            <form action="">
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="title" class="font-medium">Title</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-blue-500">
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="slug" class="font-medium">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ $post->slug }}"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-blue-500">
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="body" class="font-medium">Body</label>
                    <input id="body" type="hidden" value="{{ $post->body }}" name="body">
                    <trix-editor input="body"></trix-editor>
                </div>
            </form>
        </div>
    </div>
@endsection
