@extends('layouts.main')

@section('content')
    @include('components.navbar')
    <div class="px-16 mt-12 grid grid-cols-8 pb-12">
        <div class="col-start-3 col-span-4 bg-white p-6 rounded shadow">
            <h3 class="mb-5 text-3xl font-semibold">Edit Post</h3>
            <form action="/post/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="title" class="font-medium">Title</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-blue-500">
                    @error('title')
                        <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="slug" class="font-medium">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ $post->slug }}"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-blue-500">
                    @error('slug')
                        <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="body" class="font-medium">Body</label>
                    <input id="body" type="hidden" value="{{ $post->body }}" name="body">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                        <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="image" class="font-medium">Image</label>
                    <img src="{{ asset('storage/' . $post->image) }}" class="ml-3" width="250"
                        id="current_post_image_edit">
                    <img alt="preveiw-image" class="img-preview ml-3 hidden" width="250">
                    <input id="edit_post_image" type="file" name="edit_post_image" value="{{ $post->image }}"
                        onchange="previewImage('current_post_image_edit', 'edit_post_image')" class="mt-2">
                    @error('image')
                        <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-[#40A2E3] font-semibold text-white text-center py-2 px-3 rounded-sm mt-5">
                    Save Changes
                </button>
            </form>
        </div>
    </div>
@endsection
