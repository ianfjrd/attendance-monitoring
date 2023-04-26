@extends('admin.admindashboard')

@section('content')
    <form action="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex justify-center items-center">
            <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-10">Add Employee Form</label>
        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
                <x-input id="name"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    placeholder="John Doe" />
            </div>

            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Email</label>
                <x-input id="email"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="email" name="email" :value="old('email')" required autocomplete="username"
                    placeholder="sample@sample.com" />
            </div>
        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Password</label>

                <x-input id="password"
                    class=" text-center block py-2.5 px-0 w-1/2 text-1xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="password" name="password" required autocomplete="new-password"
                    placeholder="Must have atleast 6 characters" />
            </div>

            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Age</label>
                <input type="number" name="age"
                    class=" text-center block py-2.5 px-0 w-1/4 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    placeholder="21" required />
            </div>
        </div>

        <div class="flex justify-center items-center py-10">
            <x-button>{{ __('Register') }}</x-button>
        </div>
    </form>
@endsection
