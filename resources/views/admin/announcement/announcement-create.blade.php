@extends('admin.admindashboard')
@section('style')
    <style>
        input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(100%) brightness(95%) contrast(80%);
        }
    </style>
@endsection
@section('content')
    <form method="POST" enctype='multipart/form-data' action="{{ route('announcement.store') }}">
        @csrf

        <div class="flex justify-center items-center">
            <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-10">Add Announcement Form</label>
        </div>

        <div class="flex flex-col justify-center items-center text-center">
            <label class=" text-[#8EC33F] font-bold text-2xl">Image</label>
            <input type="file" accept="image/png, image/gif, image/jpeg" name="image" id="floating_first_name"
                class="text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                placeholder=" " required />
        </div>

        {{-- <div class="flex flex-col justify-center items-center text-center">
            <label class=" text-[#8EC33F] font-bold text-2xl">Image</label>
            <input type="text" name="image" id="floating_first_name" :value="old('image')"
                class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                placeholder="Title" required />
        </div> --}}

        <div class="flex flex-col justify-center items-center text-center">
            <label class=" text-[#8EC33F] font-bold text-2xl">Title</label>
            <input type="text" name="title" id="floating_first_name" :value="old('title')"
                class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                placeholder="Title" required />
        </div>

        <div class="flex flex-col justify-center items-center text-center">
            <label class=" text-[#8EC33F] font-bold text-2xl">Description</label>
            <textarea name="description" id="floating_first_name" :value="old('description')"
                class=" text-center block py-2.5 px-0 w-1/2 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                rows="4" cols="50" placeholder="Description" required></textarea>
        </div>

        <div class="flex justify-center items-center py-10">
            <x-button type="submit">Submit</x-button>
        </div>
    </form>
@endsection
