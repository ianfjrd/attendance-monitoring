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
        <label for="title" class="text-4xl font-bold text-white pt-5 pb-10">Update timestamp Form</label>
    </div>

    <div class="flex flex-col justify-center items-center text-center">
        <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
        <input type="text" name="floating_first_name" id="floating_first_name" disabled value="ReplaceMe"
            class=" text-center block py-2.5 px-0 w-1/4 text-2xl bg-transparent border-0 border-b-2 appearance-none text-white border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
            placeholder=" " required />
    </div>

    <div class="grid grid-cols-2">
        <div class="flex flex-col text-center items-center justify-center">
            <label class="text-[#8EC33F] font-bold text-2xl">Time In</label>
            <input type="time" class="border-0 border-b-2 text-white bg-transparent text-2xl w-1/4 px-0 block py-2.5 appearance-none border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"/>
        </div>

        <div class="flex flex-col text-center items-center justify-center">
            <label class="text-[#8EC33F] font-bold text-2xl">Time Out</label>
            <input type="time" class="border-0 border-b-2 text-white bg-transparent text-2xl w-1/4 px-0 block py-2.5 appearance-none border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"/>
        </div>
    </div>

    <div class="grid grid-cols-2">
        <div class="flex flex-col text-center items-center justify-center">
            <label class="text-[#8EC33F] font-bold text-2xl">Break In</label>
            <input type="time" class="border-0 border-b-2 text-white bg-transparent text-2xl w-1/4 px-0 block py-2.5 appearance-none focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"/>
        </div>

        <div class="flex flex-col text-center items-center justify-center">
            <label class="text-[#8EC33F] font-bold text-2xl">Break Out</label>
            <input type="time" class="border-0 border-b-2 text-white bg-transparent text-2xl w-1/4 px-0 block py-2.5 appearance-none border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"/>
        </div>
    </div>

    <div class="flex justify-center items-center py-10">
        <button class="text-xl bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
            Update
        </button>
    </div>

@endsection
