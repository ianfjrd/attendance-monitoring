<x-guest-layout>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
        <body class="bg-no-repeat bg-cover min-h-screen overflow-hidden" style="background-image: url('./images/landing.jpg');">
            <img class="absolute top-28 ml-44 left-0 transform -translate-y-1/2 w-[485px] h-[67px]" src="./images/logologin.png" alt="Image description">
            <img class="absolute top-1/2 ml-44 mt-10 left-0 transform -translate-y-1/2 w-[423px] h-[424px]" src="./images/Char1.png" alt="Image description">
            <img class="absolute top-1/2 right-0 transform -translate-y-1/2 mx-1 md:mr-44 w-[600px] h-[700px]" src="./images/cardlogin.png" alt="Image description">
                <div class="absolute top-1/2 right-0 transform -translate-y-1/2 mx-1 md:mr-72 w-full max-w-sm p-4 bg-transparent sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex">
                    <img class="w-[140px] h-[20px] mt-[6px]" src="./images/WelcomeTo.png" alt="Image description">
                    <img class="w-[221px] h-[33px]" src="./images/logo.png" alt="Image description">
                    </div>

                    <h5 class="text-xl font-medium text-white dark:text-white text-center">Fill up form below</h5>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-white" value="{{ __('Email') }}">E-mail</label>
                        <input type="email" name="email" :value="old('email')" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white dark:text-white" value="{{ __('Password') }}">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-white dark:text-gray-300">{{ __('Remember me') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                        <a class="ml-auto text-sm text-white text-opacity-50 hover:underline dark:text-blue-500" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                    <button type="submit" class="w-2/5 block mx-auto text-white bg-[#8EC33F] hover:bg-opacity-50 focus:ring-4 focus:outline-none focus:ring-white font-bold rounded-full text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('Log in') }}
                    </button>
                </form>
            </div>
        </body>
</x-guest-layout>
{{-- bivafig294@ippals.com
bivafig294 --}}
