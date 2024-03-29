@extends('layouts.main')

@section('content')
    <div class="min-h-screen flex justify-center items-center">
        <div class="flex flex-col w-full max-w-sm bg-white px-6 py-8 rounded-lg shadow">
            <h3 class="text-2xl font-bold text-center">Login</h3>
            <p class="text-base text-center">please enter your details.</p>
            <form action="" method="POST" class="mt-5">
                @csrf
                @if (session('loginError'))
                    <p class="text-red-600 text-sm mb-2"">{{ session('loginError') }}</p>
                @endif
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
                <div class="flex gap-x-2 items-center mb-4">
                    <input type="checkbox" id="remember" name="remember" class="w-3 h-3">
                    <label for="remember" class="text-gray-700 text-sm">Remember me</label>
                </div>
                <button type="submit"
                    class="w-full bg-[#40A2E3] font-semibold text-white text-center py-2 px-3 rounded-lg mb-4">Login</button>
            </form>
            <p class="text-center text-sm">
                Don't have an accout? <a href="/register" class="text-blue-600 underline hover:text-blue-950">Register</a>
            </p>
        </div>
    </div>
@endsection
