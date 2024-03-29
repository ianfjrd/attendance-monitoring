@extends('layouts.navbarfooter')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Attendance Monitoring System</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:border-gray-700 {
                --tw-border-opacity: 1;
                border-color: rgb(55 65 81 / var(--tw-border-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity))
            }
        }
    </style>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>

<body class="bg-no-repeat bg-fixed bg-cover min-h-screen" style="background-image: url('images/landing.jpg');">
    <div class="pt-40">
        <div class="relative flex items-start mb-10 justify-center">
            <div class="text-sm md:text-5xl text-white w-[350px] justify-center text-center">
                <p class="font-light text-2xl leading-loose">Current time in the PH:</p>
                <h3 id="clock"></h3>
            </div>
            <div class="text-sm md:text-5xl text-white w-[350px] justify-center text-center">
                <p class="font-light text-2xl leading-loose">Current date in the PH:</p>
                <h3 id="date-today"></h3>
            </div>
        </div>






        <div class="flex justify-center items-center place-content-stretch gap-48">
            <div class="text-center font-inter font-bold text-[35px] text-white w-[38%] flex flex-col items-center">
                All Employees Must Time In and Out for Accurate Attendance Records<br>
                @if (Auth::user())
                    {{-- <a href="{{ url('/dashboard') }}"><button type="submit"
                            class="text-white text-lg font-bold w-[134px] h-[44px] bg-[#8EC33F] shadow-md rounded-3xl text-center hover:opacity-80 ease-in duration-200">TIME
                            IN</button></a>
                    <a href="{{ url('/dashboard') }}"><button type="submit"
                            class="text-[#8EC33F] text-lg font-bold w-[134px] h-[44px] bg-transparent border border-solid border-[#8EC33F] shadow-md rounded-3xl text-center hover:opacity-80 ease-in duration-200 hover:bg-[#7cb62f] hover:text-white">TIME
                            OUT</button></a> --}}
                    @if (session()->get('nextTimestamp') == 'Work Done')
                        <div class="text-[#8EC33F] cursor-pointer text-3xl mt-4 font-bold w-fit px-4 h-[44px] bg-transparent text-center ">{{ session()->get('nextTimestamp') }}!!!</div>
                    @else
                        <div data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"><button
                                class="text-[#8EC33F] cursor-pointer text-lg font-bold w-fit px-4 h-[44px] bg-transparent border border-solid border-[#8EC33F] shadow-md rounded-3xl text-center hover:opacity-80 ease-in duration-200 hover:bg-[#7cb62f] hover:text-white">

                                @if (session()->get('nextTimestamp') == 'Break In')
                                    Start Breaktime
                                @elseif(session()->get('nextTimestamp') == 'Break Out')
                                    End Breaktime
                                @else
                                    {{ session()->get('nextTimestamp') }}
                                @endif
                            </button></div>
                    @endif
                @else
                    <a href="{{ url('/login') }}"><button type="submit"
                            class="text-[#8EC33F] text-lg font-bold w-fit h-[44px] bg-transparent border border-solid border-[#8EC33F] shadow-md rounded-3xl text-center hover:opacity-80 ease-in duration-200 hover:bg-[#7cb62f] hover:text-white px-3">
                            START NOW</button></a>
                @endif
            </div>
            <div class="text-center">
                <img src="images/char2.png" alt="char2" class="w-[512px] h-[484px] max-w-fit">
            </div>
        </div>
    </div>


    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class=" fixed left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full  ">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">

                    <div class=" relative ">
                        <form action={{ route('timestamp.store') }} method="POST">
                            @csrf
                            <div class=" mx-auto  flex justify-center flex-col items-center max-w-md gap-8 ">
                                <div class=" w-full text-center text-3xl text-[#8EC33F] font-[600] ">
                                    @if (session()->get('nextTimestamp') == 'Break In')
                                        Start Breaktime
                                    @elseif(session()->get('nextTimestamp') == 'Break Out')
                                        End Breaktime
                                    @else
                                        {{ session()->get('nextTimestamp') }}
                                    @endif
                                </div>

                                <div class=" flex justify-center  w-full flex-col ">
                                    <div class=" text-center text-xl font-semibold mb-3 text-white ">
                                        {{ date('M d, Y') }}
                                    </div>
                                    <div class="relative flex items-start mb-10 justify-center">
                                        <div
                                            class="text-sm md:text-5xl text-white w-[350px] justify-center text-center">
                                            <p class="font-light text-2xl leading-loose">Current time:</p>
                                            <h3 id="clock1"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class=" flex gap-4 w-full justify-center ">


                                    <div
                                        class=" hover:shadow-xl overflow-hidden bg-[#8EC33F] hover:bg-[#b3db77] font-[600] text-[25px] text-white rounded-full grow text-center transition-all hover:scale-110 hover:-translate-y-2 active:shadow active:scale-100 active:-translate-x-0 ">
                                        <button class=" p-1 w-full " type="submit">
                                            @if (session()->get('nextTimestamp') == 'Time In')
                                                Present!
                                            @elseif (session()->get('nextTimestamp') == 'Break In')
                                                Take a break
                                            @elseif (session()->get('nextTimestamp') == 'Break Out')
                                                Break done
                                            @else
                                                Goodbye!
                                            @endif
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>
<script type="text/javascript">
    setInterval(displayclock, 500);

    function displayclock() {
        var time = new Date();
        var hrs = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();
        var en = 'AM';
        if (hrs > 12) {
            en = 'PM';
        }
        if (hrs > 12) {
            hrs = hrs - 12;
        }
        if (hrs == 0) {
            hrs = 12;
        }
        if (hrs < 10) {
            hrs = '0' + hrs;
        }
        if (min < 10) {
            min = '0' + min;
        }
        if (sec < 10) {
            sec = '0' + sec;
        }
        document.getElementById("clock").innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
        document.getElementById("clock1").innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;

    }

    let dateToday = document.getElementById("date-today");
    let today = new Date();
    let day = `${today.getDate() < 10 ? "0" : ""}${today.getDate()}`;
    let month = `${(today.getMonth()+ 1 ) < 10 ? "0" : ""}${today.getMonth() + 1}`;
    let year = today.getFullYear();
    dateToday.textContent = `${day}-${month}-${year}`;
</script>

</html>
