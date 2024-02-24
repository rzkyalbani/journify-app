@extends('layouts.main')

@section('content')
    @include('components.navbar')
    <div class="px-16 mt-12 grid grid-cols-8 pb-12">
        <div class="col-start-3 col-span-4 bg-white p-6 rounded shadow">
            <h3 class="mb-5 text-3xl font-semibold">Create New Post</h3>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="title" class="font-medium">Title</label>
                    <input type="text" id="title" name="title"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-blue-500"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="category" class="font-medium">Category</label>
                    <select name="category" id="category"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-blue-500">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }} {{ old('category') == $category->id ? 'selected' : '' }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="slug" class="font-medium">Slug</label>
                    <input type="text" id="slug" name="slug"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-blue-500"
                        value="{{ old('slug') }}">
                    @error('slug')
                        <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="body" class="font-medium">Body</label>
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                        <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="image" class="font-medium">Image</label>
                    <img alt="preview-image" class="img-preview ml-3 hidden" width="250">
                    <img class="ml-3 hidden" width="250" id="current_post_image">
                    <input id="post_image" type="file" name="post_image"
                        onchange="previewImage('current_post_image', 'post_image')" class="mt-2">
                    @error('image')
                        <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-[#40A2E3] font-semibold text-white text-center py-2 px-3 rounded-sm mt-5">
                    Create Post
                </button>
            </form>
        </div>
    </div>
@endsection
