@extends('admin.admindashboard')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
@endsection
@section('content')
    <form action="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex justify-center items-center">
            <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-10">Add Employee Form</label>
        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
                <input id="name"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    placeholder="John Doe" />
            </div>

            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Email</label>
                <input id="email"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="email" name="email" :value="old('email')" required autocomplete="username"
                    placeholder="sample@sample.com" />
            </div>
        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Password</label>

                <input id="password"
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

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <select id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="text-2xl border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:ring-0 focus:border-[#8EC33F] text-center inline-flex items-center py-2 px-4 text-gray-800 font-semibold focus:outline-none"
                    type="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg
                        class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    {{-- <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton"> --}}
                        <option>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">IT Department</a>
                        </option>
                        <option>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Marketing Department</a>
                        </option>
                    {{-- </ul> --}}
                </div>
            </select>
            </div>

            <div class="flex flex-col justify-center items-center text-center">
                <button id="dropdownRole" data-dropdown-toggle="dropdown"
                    class="text-2xl border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:ring-0 focus:border-[#8EC33F] text-center inline-flex items-center py-2 px-4 text-gray-800 font-semibold focus:outline-none"
                    type="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Role&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="w-4 h-4 ml-2"
                        aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownRole"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Programmer</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Designer</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Marketing</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Phone Number</label>

                <input id="phoneNumber"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="tel" name="phoneNumber" required placeholder="0905-123-4567" />
            </div>

            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Valid ID Number</label>
                <input type="number" name="idNumber"
                    class=" text-center block py-2.5 px-0 w-1/4 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    placeholder="001" required />
            </div>
        </div>

        <div class="justify-center items-center text-center my-12">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Address</label>

                <input id="address"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="text" name="address" required placeholder="Unit ### Tower #, ** Condominium, St. Paul Street, San Antonio Village, Makati 1203" />
            </div>


        </div>

        <div class="flex justify-center items-center py-10">
            <x-button>{{ __('Register') }}</x-button>
        </div>
    </form>
@endsection
