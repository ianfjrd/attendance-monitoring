@extends('admin.admindashboard')

@section('style')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
@endsection

@section('content')
    <form method="POST" enctype='multipart/form-data' action="{{ route('leavetypes.update', $leavetype->id) }}">
        @csrf
        @method('PATCH')

        <div class="text-center text-white">
            <h1 class="mb-4 text-3xl font-extrabold text-white md:text-5xl lg:text-6xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-[#02d397] from-[#06679b]">UPDATE</span>
                TYPE OF LEAVE</h1>
        </div>

        <div class="justify-center items-center flex flex-col text-center my-12">
            <label for="large-input" class="block mb-2 text-sm font-medium text-white">Type of Leave Name</label>
            <input type="text" id="large-input" name="name" value="{{ $leavetype->name }}"
                class="block w-96 p-4 border rounded-lg sm:text-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="flex justify-center">
            <x-button>Submit Form</x-button>
        </div>
    </form>
@endsection
