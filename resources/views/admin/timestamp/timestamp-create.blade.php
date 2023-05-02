@extends('admin.admindashboard')
@section('style')
    <style>
        input[type="datetime-local"]::-webkit-calendar-picker-indicator {
            filter: invert(100%) brightness(95%) contrast(80%);
        }
    </style>
@endsection
@section('content')
    <div class="flex justify-center items-center">
        <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-10">Add timestamp Form</label>
    </div>
    <form action="{{ route('timestampCreateAdmin') }}" method="POST">
        @csrf
        <div class="flex flex-col justify-center items-center text-center">
            <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
            <select type="text" name="user_id" id="floating_first_name"
                class=" text-center block py-2.5 px-0 w-1/4 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                placeholder=" " required>
                <option value="" class=" bg-gray-700 text-slate-500 ">Select Employee</option>
                @foreach ($users as $key => $user)
                    <option value="{{ $key }}" @selected(old('user_id') == $key) class=" bg-gray-700 ">
                        {{ $user }}</option>
                @endforeach
            </select>
            @error('user_id')
                <small class=" italic text-red-400 ">{{ $message }}</small>
            @enderror
        </div>

        <div class="grid grid-cols-2">
            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Time In</label>
                <input type="datetime-local" name="time_in" value="{{ old('time_in') }}"
                    class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/2 mb-1 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                @error('time_in')
                    <small class=" italic text-red-400 mb-4">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Time Out</label>
                <input type="datetime-local" name="time_out" value="{{ old('time_out') }}"
                    class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/2 mb-1 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                @error('time_out')
                    <small class=" italic text-red-400 mb-4">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2">
            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Break In</label>
                <input type="datetime-local" name="break_in" value="{{ old('break_in') }}"
                    class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/2 mb-1 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                @error('break_in')
                    <small class=" italic text-red-400 mb-4">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Break Out</label>
                <input type="datetime-local" name="break_out" value="{{ old('break_out') }}"
                    class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/2 mb-1 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                @error('break_out')
                    <small class=" italic text-red-400 mb-4">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="flex justify-center items-center py-10">
            <button type="submit"
                class="text-xl bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
                Add Form
            </button>
        </div>
    </form>
@endsection
