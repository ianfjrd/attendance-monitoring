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
    @if ($errors->first())
        <div id="alert-3" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ $errors->first() }}</div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif
    @php
        $workdays = unserialize($user->workdays);
    @endphp

    <form id="updateUserForm" method="POST" action="{{ route('user.update', $user->id) }}">

        @csrf
        @method('PUT')

        <div class="flex justify-center items-center">
            <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-10">Edit Employee Form</label>
        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
                <input id="name"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus
                    autocomplete="name" placeholder="John Doe" />
                @error('name')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror

            </div>

            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Email</label>
                <input id="email"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                    placeholder="sample@sample.com" />
                @error('email')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Password</label>
                <input id="password" disabled value="12345678"
                    class=" cursor-not-allowed text-center block py-2.5 px-0 w-1/2 text-1xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="password" name="password" required autocomplete="new-password"
                    placeholder="Must have atleast 6 characters" />
                @error('password')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Age</label>
                <input type="number" name="age" value="{{ old('age', $user->age) }}"
                    class=" text-center block py-2.5 px-0 w-1/4 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    placeholder="21" required />
                @error('age')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Department</label>
                <select id="countries" name="department_id"
                    class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-1xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#8EC33F] dark:focus:border-[#8EC33F]">
                    <option selected>Choose a Department</option>
                    @foreach ($departments as $department)
                        <option value="{{$department->id}}" @selected($user->department_id == $department->id)>{{$department->name}}</option>
                    @endforeach
                </select>
                @error('department')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Role</label>
                <select name="role" id="countries"
                    class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-1xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#8EC33F] dark:focus:border-[#8EC33F]">
                    <option selected>Choose a Role</option>
                    <option value="Admin" @selected($user->role == 'Admin')>Admin</option>
                    <option value="Intern" @selected($user->role == 'Intern')>Intern</option>
                    <option value="Marketing" @selected($user->role == 'Marketing')>Marketing</option>
                    <option value="Programmer" @selected($user->role == 'Programmer')>Programmer</option>
                    <option value="Web Designer" @selected($user->role == 'Web Designer')>Web Designer</option>
                </select>
                @error('role')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="grid grid-cols-2 py-5">
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Phone Number</label>

                <input id="phoneNumber" value="{{ old('phone_number', $user->phone_number) }}"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="tel" name="phone_number" required placeholder="0905-123-4567" />
                @error('phone_number')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>

            {{-- <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Valid ID Number</label>
                <input type="number" value="{{ old('valid_id_number', $user->valid_id_number) }}" name="valid_id_number"
                    class=" text-center block py-2.5 px-0 w-1/4 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    placeholder="001" required />
                @error('valid_id_number')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div> --}}
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Address</label>

                <input id="address" value="{{ old('address', $user->valid_id_number) }}"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="text" name="address" required
                    placeholder="Unit ### Tower #, ** Condominium, St. Paul Street, San Antonio Village, Makati 1203" />
                @error('address')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>
        </div>

        {{-- <div class="justify-center items-center text-center my-12">
            
        </div> --}}

        <hr class="my-12 h-0.5 border-t-0 bg-neutral-100 opacity-100 dark:opacity-50" />

        <div class="flex justify-center items-center">
            <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-10">User Schedule</label>
        </div>

        <div class=" mx-12">
            <ul
                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-transparent dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input {{ is_array(old('workdays')) || in_array('Sunday', $workdays) ? 'checked' : '' }}
                            id="react-checkbox-list" name="workdays[]" type="checkbox" value="Sunday"
                            class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="react-checkbox-list"
                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sunday</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input {{ is_array(old('workdays')) || in_array('Monday', $workdays) ? 'checked' : '' }}
                            id="vue-checkbox-list" name="workdays[]" type="checkbox" value="Monday"
                            class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox-list"
                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Monday</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input {{ is_array(old('workdays')) || in_array('Tuesday', $workdays) ? 'checked' : '' }}
                            id="react-checkbox-list" name="workdays[]" type="checkbox" value="Tuesday"
                            class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="react-checkbox-list"
                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tuesday</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input {{ is_array(old('workdays')) || in_array('Wednesday', $workdays) ? 'checked' : '' }}
                            id="angular-checkbox-list" name="workdays[]" type="checkbox" value="Wednesday"
                            class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="angular-checkbox-list"
                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wednesday</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input {{ is_array(old('workdays')) || in_array('Thursday', $workdays) ? 'checked' : '' }}
                            id="react-checkbox-list" name="workdays[]" type="checkbox" value="Thursday"
                            class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="react-checkbox-list"
                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Thursday</label>
                    </div>
                </li>

                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input {{ is_array(old('workdays')) || in_array('Friday', $workdays) ? 'checked' : '' }}
                            id="react-checkbox-list" name="workdays[]" type="checkbox" value="Friday"
                            class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="react-checkbox-list"
                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Friday</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input {{ is_array(old('workdays')) || in_array('Saturday', $workdays) ? 'checked' : '' }}
                            id="react-checkbox-list" name="workdays[]" type="checkbox" value="Saturday"
                            class="w-4 h-4 text-[#8EC33F] bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-[#8EC33F] dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="react-checkbox-list"
                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saturday</label>
                    </div>
                </li>
            </ul>
            @error('workdays')
                <div class=" flex justify-center">
                    <small class=" italic text-red-400  w-fit ">{{ $message }}</small>
                </div>
            @enderror
        </div>


        <div class="grid grid-cols-3 pt-5 ">
            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Time In</label>
                <input type="time" name="time_in_user" value="{{ old('time_in_user', $user->time_in_user) }}"
                    class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/2 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                @error('time_in_user')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Break Duration (mins)</label>
                <input type="number" name="break_duration" value="{{ old('break_duration', $user->break_duration) }}"
                    class=" text-center block py-2.5 px-0 w-1/4 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    placeholder="--" required />
                @error('break_duration')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Time Out</label>
                <input type="time" name="time_out_user" value="{{ old('time_out_user', $user->time_out_user) }}"
                    class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/2 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                @error('time_out_user')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>
        </div>

        {{-- <div class="flex justify-center items-center">
            <label for="title" class="text-4xl font-bold dark:text-white pt-20 pb-10">Day</label>
        </div> --}}



        <div class="flex justify-center items-center py-10">
            <button type="submit" id="formSubmit"
                class="text-xl bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
                Submit
            </button>
        </div>



    </form>
    <script>
        $('#formSubmit').click(function(e) {
            $('#updateUserForm')[0].reset();

        });
    </script>
@endsection
