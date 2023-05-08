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

    <form method="POST" enctype='multipart/form-data' action="{{ route('department.update', $department->id) }}">
        @csrf
        @method('PATCH')

        <div class="text-center dark:text-white">
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-[#02d397] from-[#06679b]">UPDATE</span>
                DEPARTMENT</h1>
        </div>

        <div class="justify-center items-center flex flex-col text-center my-12">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department Name</label>
            <input type="text" id="large-input" name="name" value="{{ $department->name }}"
                class="block w-96 p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>

        <div class="flex justify-center">
            <x-button>Submit Form</x-button>
        </div>
    </form>
@endsection
