@extends('admin.admindashboard')

@section('style')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
@endsection

@section('content')
    <form method="POST" enctype='multipart/form-data' action="{{ route('leaves.store') }}">
        @csrf

        <div class="text-center text-white">
            <h1 class="mb-4 text-3xl font-extrabold text-white md:text-5xl lg:text-6xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-[#02d397] from-[#06679b]">EMPLOYEE LEAVE</span>
                FORM</h1>
        </div>

        <div class="grid grid-cols-2 gap-28">
            <div class="grid justify-items-center place-self-end pb-4">
                {{-- <select class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-50 dark:bg-gray-700" name="type" :value="old('type')"  id="type">
                    <option>Type of Leave</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Casual Leave">Casual Leave</option>
                    <option value="Public Holiday">Public Holiday</option>
                    <option value="Religious Holiday">Religious Holiday</option>
                    <option value="Maternity Leave">Maternity Leave</option>
                    <option value="Paternity Leave">Paternity Leave</option>
                </select> --}}
                <select class="z-10 divide-y divide-gray-100 rounded-lg shadow w-50 bg-gray-700" name="leave_types_id" :value="old('type')"  id="leave_types_id">
                    <option>Type of Leave</option>
                    @foreach ($leavetypes as $leavetype)
                        <option value="{{ $leavetype->id }}" @selected(old('leave_types_id') == $leavetype->id)>{{$leavetype->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid justify-items-center place-self-start pb-4">
                <select class="z-10 divide-y divide-gray-100 rounded-lg shadow w-50 bg-gray-700" name="user_id" :value="old('type')"  id="user_id">
                    <option>Name of Employee</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-center my-12">
            <div date-rangepicker class="flex items-center w-fit">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pt-7 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <label for="default-input"
                        class="text-center block mb-2 text-sm font-medium text-white">Start Date</label>
                    <input name="date_start" type="text" :value="old('date_start')"
                        class=" text-sm rounded-lg block w-full pl-10 p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Select date start">
                </div>

                <span class="mx-4 pt-7 text-gray-500">to</span>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pt-7 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <label for="default-input"
                        class="text-center block mb-2 text-sm font-medium text-white">End Date</label>
                    <input name="date_end" type="text" :value="old('date_end')"
                        class="border text-sm rounded-lg block w-full pl-10 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Select date end">
                </div>
            </div>
        </div>

        <div class="justify-center items-center flex flex-col text-center my-12">
            <label for="large-input" class="block mb-2 text-sm font-medium text-white">Reason</label>
            <textarea type="text" id="large-input" name="reason" :value="old('reason')"
                class="block w-96 p-4 border rounded-lg sm:text-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div class="flex justify-center">
            <x-button>Submit Form</x-button>
        </div>
    </form>
@endsection
