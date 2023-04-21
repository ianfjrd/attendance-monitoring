<x-guest-layout>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <body class="bg-no-repeat bg-cover min-h-screen" style="background-image: url('./images/landing.jpg');">
        <div class="h-screen container relative items-center mx-auto w-auto grid grid-cols-2">
            <div class=" h-full flex items-center">
                <div>
                    <a href="/"><img class="ml-44 w-[485px] h-[67px]" src="./images/logologin.png"
                            alt="Image description"></a>
                    <img class=" top-1/2 ml-44 mt-10 left-0 w-[423px] h-[424px]" src="./images/Char1.png"
                        alt="Image description">
                </div>
            </div>
            <div class="h-full flex items-center">
                <div>
                        <div class="top-1/2 right-0 mx-1 md:mr-72 w-full h-contain flex justify-center bg-cover max-w-xl p-4 sm:p-6 md:py-32" style="background-image: url('./images/cardlogin.png');">
                            <form class="h-[420px] w-[350px] space-y-6" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="flex">
                                <img class="w-[140px] h-[20px] mt-[6px]" src="./images/WelcomeTo.png" alt="Image description">
                                <img class="w-[221px] h-[33px]" src="./images/logo.png" alt="Image description">
                                </div>

                                <h5 class="text-xl font-medium text-white dark:text-white text-center">Fill up form below</h5>
                                <x-validation-errors/>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-white" value="{{ __('Email') }}">E-mail</label>
                                    <input type="email" name="email" :value="old('email')" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required>
                                </div>

                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-white dark:text-white" value="{{ __('Password') }}">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                                        </div>
                                        <label for="remember" class="ml-2 text-sm font-medium text-white">{{ __('Remember me') }}</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="ml-auto text-sm text-white text-opacity-50 hover:underline" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                </div>
                                <button type="submit" class="w-2/5 block mx-auto text-white bg-[#8EC33F] hover:opacity-80 ease-in duration-200 focus:ring-4 focus:outline-none focus:ring-white font-bold rounded-full text-lg px-5 py-2.5 text-center">
                                    {{ __('Log in') }}
                                </button>
                            </form>
                        </div>
                </div>


            </div>

        </div>

    </body>
</x-guest-layout>
