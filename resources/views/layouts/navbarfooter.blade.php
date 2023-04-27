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
    <nav class="bg-gre shadow py-2 fixed top-0 left-0 right-0 z-10 mt-10">
        <div x-data="{isOpen: false}" class="mx-auto px-5 md:px-12.5 lg:px-20">

            <div class="md:flex md:justify-between items-center">
                {{-- logo --}}
                <div class="flex items-center">
                    <a href="/">
                        <img src="/images/logo.png" alt="main logo" class="w-120 h-12 mr-1 sm:mr-2 lg:mr-3">
                    </a>
                            @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-16 px-6 py-4 sm:block mt-10">
                                    @auth
                                        {{-- <a href="{{ url('/Contact') }}" class="text-[#FFFFFF] ml-4">Contact</a> --}}
                                        {{-- <a href="{{ url('/Attendance') }}" class="text-[#FFFFFF] ml-4">Attendance</a> --}}
                                        {{-- <a href="{{ url('user/profile') }}" class="text-[#FFFFFF] ml-4">Profile</a> --}}
                                        <a href="{{ url('/dashboard') }}"><button class="ml-4 bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
                                            Dashboard
                                        </button></a>
                                        {{-- <a href="{{ url('/Profile') }}">Profile</a> --}}
                            @else
                                        {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a> --}}
                                        {{-- <a href="{{ url('/Contact') }}" class="text-[#FFFFFF] ml-4 hover:text-[#8EC33F] ease-in duration-200">Contact</a> --}}
                                        {{-- <a href="{{ url('/Attendance') }}" class="text-[#FFFFFF] ml-4 hover:text-[#8EC33F] ease-in duration-200">Attendance</a> --}}
                                        {{-- <a href="{{ url('user/profile') }}" class="text-[#FFFFFF] ml-4 hover:text-[#8EC33F] ease-in duration-200">Profile</a> --}}
                                        <a href="{{ route('login') }}"><button class="ml-4 text-sm hover:opacity-80 ease-in duration-200 bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
                                            LOG IN
                                        </button>
                                            </a>
                                    @endauth
                            @endif
                </div>

            </div>
        </div>
    </nav>


</body>

</html>
