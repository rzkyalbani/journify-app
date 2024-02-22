@extends('layouts.main')

@section('content')
    @include('components.navbar')
    <div class="px-16 mt-12 grid grid-cols-4">
        <div class="col-span-1 py-2 px-8">
            @include('components.sidebar')
        </div>
        <div class="col-span-2 p-2">
            <div class="flex gap-x-3 items-center mb-8">
                <div class="flex flex-col gap-y-1">
                    <span class="flex gap-x-2 items-center">
                        <img src="{{ asset('storage/profile-pictures/7A0HJvet3K4ceh8HteSFpbHh2H6REAyUpOrdqxSi.jpg') }}"
                            width="20" height="20" class="rounded-full">
                        <p class="text-xs font-medium">Rizky Albani <span class="font-normal">in</span> Anime</p>
                    </span>
                    <h1 class="font-bold text-xl">Assassination Classroom: The Saddest Anime Ever</h1>
                    <p class="text-gray-600 text-sm font-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed explicabo ratione maiores placeat aliquam dolores molestiae sint repudiandae? Vitae.</p>
                    <small class="text-xs font-extralight mt-3">May, 05 2022</small>
                </div>
                <img src="{{ asset('images/assassination-classroom.webp') }}" width="250">
            </div>
        </div>
    </div>
@endsection
