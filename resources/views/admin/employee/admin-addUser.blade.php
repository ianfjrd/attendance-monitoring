@extends('admin.admindashboard')
@section('style')
    <style>
        input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(100%) brightness(95%) contrast(80%);
        }
    </style>
@endsection
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
                <label class=" text-[#8EC33F] font-bold text-2xl">Department</label>
                <select id="countries"
                    class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-1xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#8EC33F] dark:focus:border-[#8EC33F]">
                    <option selected>Choose a Department</option>
                    <option>IT Department</option>
                    <option>Marketing Department</option>
                </select>
            </div>

            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Role</label>
                <select id="countries"
                    class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-1xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#8EC33F] dark:focus:border-[#8EC33F]">
                    <option selected>Choose a Role</option>
                    <option>Programmer</option>
                    <option>Designer</option>
                    <option>Marketing</option>
                </select>
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
                    type="text" name="address" required
                    placeholder="Unit ### Tower #, ** Condominium, St. Paul Street, San Antonio Village, Makati 1203" />
            </div>
        </div>

        <hr class="my-12 h-0.5 border-t-0 bg-neutral-100 opacity-100 dark:opacity-50" />

        <div class="flex justify-center items-center">
            <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-10">User Schedule</label>
        </div>

        <div class=" mx-12">
            <ul
            class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-transparent dark:border-gray-600 dark:text-white">
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="react-checkbox-list" type="checkbox" value=""
                        class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="react-checkbox-list"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sunday</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="vue-checkbox-list" type="checkbox" value=""
                        class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="vue-checkbox-list"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Monday</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="react-checkbox-list" type="checkbox" value=""
                        class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="react-checkbox-list"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tuesday</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="angular-checkbox-list" type="checkbox" value=""
                        class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="angular-checkbox-list"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wednesday</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="react-checkbox-list" type="checkbox" value=""
                        class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="react-checkbox-list"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Thursday</label>
                </div>
            </li>

            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="react-checkbox-list" type="checkbox" value=""
                        class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="react-checkbox-list"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Friday</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="react-checkbox-list" type="checkbox" value=""
                        class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="react-checkbox-list"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saturday</label>
                </div>
            </li>
        </ul>
        </div>


        <div class="grid grid-cols-3 pt-5 ">
            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Time In</label>
                <input type="time"
                    class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/2 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
            </div>

            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Break Duration (mins)</label>
                <input type="number" name="idNumber"
                    class=" text-center block py-2.5 px-0 w-1/4 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    placeholder="--" required />
            </div>

            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Time Out</label>
                <input type="time"
                    class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/2 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
            </div>
        </div>

        {{-- <div class="flex justify-center items-center">
            <label for="title" class="text-4xl font-bold dark:text-white pt-20 pb-10">Day</label>
        </div> --}}



        <div class="flex justify-center items-center py-10">
            <button class="text-xl bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
                Submit
            </button>
        </div>



    </form>
@endsection
