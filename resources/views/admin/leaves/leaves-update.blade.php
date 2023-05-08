@extends('admin.admindashboard')

@section('style')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
@endsection

@section('content')
    {{-- @php
        function remainingDays($date_start, $date_end) {
            $start = new DateTime($date_start);
            $end = new DateTime($date_end);
            $interval = $start->diff($end);
            $remaining_days = $interval->days;

            return $remaining_days;
        }
    @endphp --}}

    <form method="POST" enctype='multipart/form-data' action="{{ route('leaves.update', $leave->id) }}">
        @csrf
        @method('PATCH')

        <div class="text-center text-white">
            <h1 class="mb-4 text-3xl font-extrabold text-white md:text-5xl lg:text-6xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-[#02d397] from-[#06679b]">EMPLOYEE LEAVE</span>
                FORM</h1>
        </div>

        <div class="grid grid-cols-2 gap-28">
            <div class="grid justify-items-center place-self-end pb-4">
                {{-- <select class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                    name="type" id="type">
                    <option value="Sick Leave" {{ $leave->type === "Sick Leave" ? "selected" : "" }}>Sick Leave</option>
                    <option value="Casual Leave" {{ $leave->type === "Casual Leave" ? "selected" : "" }}>Casual Leave</option>
                    <option value="Public Holiday" {{ $leave->type === "Public Holiday" ? "selected" : "" }}>Public Holiday</option>
                    <option value="Religious Holiday" {{ $leave->type === "Religious Holiday" ? "selected" : "" }}>Religious Holiday</option>
                    <option value="Maternity Leave" {{ $leave->type === "Maternity Leave" ? "selected" : "" }}>Maternity Leave</option>
                    <option value="Paternity Leave" {{ $leave->type === "Paternity Leave" ? "selected" : "" }}>Paternity Leave</option>
                </select> --}}
                <select class="z-10 divide-y divide-gray-100 rounded-lg shadow w-44 bg-gray-700"
                    name="leave_types_id" id="leave_types_id">
                    @foreach ($leavetypes as $leavetype)
                        <option value="{{ $leavetype->id }}" {{ $leave->leave_types_id === $leavetype->id ? 'selected' : '' }}>{{ $leavetype->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid justify-items-center place-self-start pb-4">
                <select class="z-10 divide-y divide-gray-100 rounded-lg shadow w-44 bg-gray-700"
                    name="leaves_status" id="type">
                    <option value="Pending" {{ $leave->leaves_status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $leave->leaves_status === 'Approved' ? 'selected' : '' }}>Approved</option>
                </select>
            </div>
            {{-- <div class="grid justify-items-center place-self-start">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remaining
                    Days</label>
                <p class="text-4xl font-black text-gray-900 dark:text-white">4</p>
            </div> --}}

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
                    <input name="date_start" type="text" value="{{ $leave->date_start }}"
                        class="text-sm rounded-lg block w-full pl-10 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
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
                    <input name="date_end" type="text" value="{{ $leave->date_end }}"
                        class="border text-sm rounded-lg block w-full pl-10 p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Select date end">
                </div>
            </div>
        </div>

        <div class="justify-center items-center flex flex-col text-center my-12">
            <label for="large-input" class="block mb-2 text-sm font-medium text-white">Reason</label>
            <textarea type="text" id="large-input" name="reason"
                class="block w-96 p-4 border rounded-lg sm:text-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">{{ $leave->reason }}</textarea>
        </div>

        <div class="flex justify-center">
            <x-button>Submit Form</x-button>
        </div>
    </form>
@endsection
