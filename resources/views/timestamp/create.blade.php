<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex h-screen flex-col justify-center items-center">
        <form action={{route('timestamp.store')}}
            method="POST"
            enctype="multipart/form-data"
            class="flex flex-col justify-center items-center bg-red-100 gap-2" 
        >
            @csrf
            <button type="submit" class="rounded-full bg-blue-300 min-w-[150px] px-3 py-3">
                {{$timestamp_name}}
            </button>
            <p> User Status -> {{$status}}</p>
        </form>
    </body>
</html>