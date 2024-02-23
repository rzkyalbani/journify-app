@extends('layouts.main')

@section('content')
    <div class="min-h-screen flex justify-center items-center">
        <div class="flex flex-col w-full max-w-sm bg-white px-6 py-8 rounded-lg shadow">
            <h3 class="text-2xl font-bold text-center">Register</h3>
            <p class="text-base text-center">please enter your details.</p>
            <form action="/store" method="POST" class="mt-5">
                @csrf
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="name" class="font-medium text-sm">Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" value="{{ old('name') }}"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-none">
                    @error('name')
                        <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="username" class="font-medium text-sm">Usename</label>
                    <input type="text" id="username" name="username" placeholder="johndoe" value="{{ old('username') }}"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-none">
                    @error('username')
                        <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="password" class="font-medium text-sm">Password</label>
                    <input type="password" id="password" name="password" placeholder="******"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-none">
                    @error('password')
                        <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mb-4">
                    <label for="password_confirmation" class="font-medium text-sm">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="******"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-none">
                    @error('password_confirmation')
                        <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-[#40A2E3] font-semibold text-white text-center py-2 px-3 rounded-lg mb-4">Register</button>
            </form>
            <p class="text-center text-sm">
                Have an account? <a href="/login" class="text-blue-600 underline hover:text-blue-950">Login</a>
            </p>
        </div>
    </div>
@endsection
