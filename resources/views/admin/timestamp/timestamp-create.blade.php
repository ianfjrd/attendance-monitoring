@extends('admin.admindashboard')
@section('style')
<style>
    input[type="time"]::-webkit-calendar-picker-indicator{
  filter: invert(100%) brightness(95%) contrast(80%);
}
</style>
@endsection
@section('content')
    <div class="flex justify-center items-center">
        <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-10">Add timestamp Form</label>
    </div>

    <div class="flex flex-col justify-center items-center text-center">
        <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
        <input type="text" name="floating_first_name" id="floating_first_name" disabled value="ReplaceMe"
            class=" text-center block py-2.5 px-0 w-1/4 text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
            placeholder=" " required />
    </div>

    <div class="grid grid-cols-2">
        <div class="flex flex-col text-center items-center justify-center">
            <label class="text-[#8EC33F] font-bold text-2xl">Time In</label>
            <input type="time" class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/4 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"/>
        </div>

        <div class="flex flex-col text-center items-center justify-center">
            <label class="text-[#8EC33F] font-bold text-2xl">Time Out</label>
            <input type="time" class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/4 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"/>
        </div>
    </div>

    <div class="grid grid-cols-2">
        <div class="flex flex-col text-center items-center justify-center">
            <label class="text-[#8EC33F] font-bold text-2xl">Break In</label>
            <input type="time" class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/4 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"/>
        </div>

        <div class="flex flex-col text-center items-center justify-center">
            <label class="text-[#8EC33F] font-bold text-2xl">Break Out</label>
            <input type="time" class="border-0 border-b-2 dark:text-white bg-transparent text-2xl w-1/4 px-0 block py-2.5 text-gray-900 appearance-none border-gray-300 dark:border-[#8EC33F] dark:focus:border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"/>
        </div>
    </div>

    <div class="flex justify-center items-center py-10">
        <x-button>Add Form</x-button>
    </div>

@endsection
