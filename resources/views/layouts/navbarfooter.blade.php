<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Attendance Monitoring System</title>

    <!-- Fonts -->
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased " x-data="mainState" :class="{dark: isDarkMode}" x-cloak>
    {{-- nav bar goes heres --}}
    <nav class="bg-gre shadow py-2 fixed top-0 left-0 right-0 z-10">
        <div x-data="{isOpen: false}" class="mx-auto px-5 md:px-12.5 lg:px-20">

            <div class="md:flex md:justify-between items-center">
                {{-- logo --}}
                <div class="flex items-center">
                    <a href="/">
                        <img src="/images/logo.png" alt="main logo" class="w-120 h-12 mr-1 sm:mr-2 lg:mr-3">
                    </a>

                    {{-- primary --}}
                    <div class="flex flex-col">
                    {{-- <h3 class="hidden md:block text-md pl-2 md:text-xl font-light text-sky-50">Marvill Web Development Attendance System</h3> --}}
                    {{-- <p class="hidden md:block text-md pl-2 md:text-xl font-light text-sky-50">School Portal</p> --}}
                    </div>
                </div>
                <x-guest-layout>
                <div class="flex flex-col md:flex-row gap-3 md:gap-x-7 transition ease-in-out duration-1000">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/Contact') }}" class="text-[#FFFFFF] ml-4">Contact</a>
                                <a href="{{ url('/Attendance') }}" class="text-[#FFFFFF] ml-4">Attendance</a>
                                <a href="{{ url('/Profile') }}" class="text-[#FFFFFF] ml-4">Profile</a>
                                <a href="{{ url('/dashboard') }}"><x-button class="ml-4">Dashboard</x-button></a>
                                {{-- <a href="{{ url('/Profile') }}">Profile</a> --}}
                            @else
                                {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a> --}}
                                <a href="{{ url('/Contact') }}" class="text-[#FFFFFF] ml-4">Contact</a>
                                <a href="{{ url('/Attendance') }}" class="text-[#FFFFFF] ml-4">Attendance</a>
                                <a href="{{ url('/Profile') }}" class="text-[#FFFFFF] ml-4">Profile</a>
                                <a href="{{ route('login') }}"><x-button class="ml-4">Log In</x-button></a>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif --}}
                            @endauth
                        </div>
                    @endif
                </x-guest-layout>


</body>

</html>
