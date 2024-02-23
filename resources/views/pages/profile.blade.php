@extends('layouts.main')

@section('content')
    @include('components.navbar')
    <div class=" flex justify-center mt-12">
        <div class="flex flex-col w-full max-w-3xl bg-white px-8 py-6 rounded-md shadow gap-y-4">
            <div class="flex items-center gap-x-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#40A2E3"
                    class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                <h3 class="text-3xl font-medium">Profile</h3>
            </div>
            @if (session('updateSuccess'))
                <div class="text-green-500 mb-1">
                    {{ session('updateSuccess') }}
                </div>
            @endif
            <form action="/profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-5">


                    {{-- <div class="row-2">
                        <div class="flex flex-col gap-y-1 mb-3">
                            <label for="password" class="font-medium text-base">Password</label>
                            <input type="password" id="password" name="password" placeholder="******" value="tes"
                                class="border border-gray-300 py-2 px-3 rounded-sm focus:outline-none"
                                value="{{ $user->password }}">
                            @error('password')
                                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-y-1 mb-4">
                            <label for="password_confirmation" class="font-medium text-sm">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="******" class="border border-gray-300 py-2 px-3 rounded-sm focus:outline-none"
                                value="{{ $user->password }}">
                            @error('password_confirmation')
                                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="row-1 flex items-center">
                        <label for="profile_picture"
                            class="cursor-pointer relative rounded-sm outline outline-1 outline-neutral-200 p-1">
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="profile-picture"
                                id="current_profile_picture">
                            <img alt="preveiw-image" class="img-preview hidden">
                            <span class="absolute -right-2 -bottom-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#40A2E3" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </span>
                        </label>
                        <input type="file" class="hidden" name="profile_picture" id="profile_picture"
                            onchange="previewImage()">
                        @error('profile_picture')
                            <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row-2">
                        <div class="flex flex-col gap-y-1 mb-3">
                            <label for="name" class="font-medium text-base">Full Name</label>
                            <input type="text" id="name" name="name" placeholder="johndoe"
                                value="{{ $user->name }}"
                                class="border border-gray-300 py-2 px-3 rounded-sm focus:outline-none">
                            @error('name')
                                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-y-1 mb-3">
                            <label for="username" class="font-medium text-base">Username</label>
                            <input type="text" id="username" name="username" placeholder="johndoe"
                                value="{{ $user->username }}"
                                class="border border-gray-300 py-2 px-3 rounded-sm focus:outline-none">
                            @error('username')
                                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-y-1 mb-3">
                            <label for="password" class="font-medium text-base">Password</label>
                            <input type="password" id="password" name="password" placeholder="******"
                                class="border border-gray-300 py-2 px-3 rounded-sm focus:outline-none">
                            @error('password')
                                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-y-1 mb-4">
                            <label for="password_confirmation" class="font-medium text-sm">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="******" class="border border-gray-300 py-2 px-3 rounded-sm focus:outline-none">
                            @error('password_confirmation')
                                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-[#40A2E3] font-semibold text-white text-center py-2 px-3 rounded-sm mt-5">
                    Save Changes
                </button>
            </form>
        </div>
    </div>
@endsection
