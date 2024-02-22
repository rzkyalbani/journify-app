@extends('layouts.main')

@section('content')
    <div class="min-h-screen flex justify-center items-center">
        <div class="flex flex-col w-full max-w-sm bg-white px-6 py-8 rounded-lg shadow">
            <h3 class="text-2xl font-bold text-center">Register</h3>
            <p class="text-base text-center">please enter your details.</p>
            <form action="" method="POST" class="mt-5">
                @csrf
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="name" class="font-medium text-sm">Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-none">
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="username" class="font-medium text-sm">Usename</label>
                    <input type="text" id="username" name="username" placeholder="johndoe"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-none">
                </div>
                <div class="flex flex-col gap-y-2 mb-3">
                    <label for="password" class="font-medium text-sm">Password</label>
                    <input type="password" id="password" name="password" placeholder="******"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-none">
                </div>
                <div class="flex flex-col gap-y-2 mb-4">
                    <label for="confirm-password" class="font-medium text-sm">Confirm Password</label>
                    <input type="confirm-password" id="confirm-password" name="confirm-password" placeholder="******"
                        class="border border-gray-300 py-1 px-3 rounded-md focus:outline-none">
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 font-semibold text-white text-center py-2 px-3 rounded-lg mb-4">Register</button>
            </form>
            <p class="text-center text-sm">
                Have an account? <a href="/login" class="text-blue-600 underline hover:text-blue-950">Login</a>
            </p>
        </div>
    </div>
@endsection