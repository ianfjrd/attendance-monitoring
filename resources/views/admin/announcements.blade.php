@extends('admin.admindashboard')

@section('content')
    <main class="py-6 px-4 sm:p-6 md:py-10 md:px-8 border">
        <div class="border max-w-4xl mx-auto grid lg:grid-cols-2 lg:max-w-5xl lg:gap-x-20">
            <div class="hover:border-[#8EC33F] hover:text-[#8EC33F] border-4 border-dashed border-gray-500 relative">
                <input type="file" multiple class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                <div class="text-center p-10 absolute top-0 right-0 left-0 m-auto">
                    <h4>
                        Drop files anywhere to upload
                        <br />or
                    </h4>
                    <p class="">Select Files</p>
                </div>
            </div>
            <div class="border row-span-2">
                <h2>test</h2>
            </div>
        </div>
        <div class="border py-4 max-w-4xl mx-auto grid lg:grid-cols-2 lg:max-w-5xl lg:gap-x-20">
            <div class="border flex flex-col justify-center items-center text-center">
                <textarea
                    class="resize-none text-center block py-2.5 px-0 w-full text-2xl bg-transparent border-none border-b-2 appearance-none text-[#8EC33F] border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    placeholder="Enter your title here"></textarea>
            </div>
        </div>


    </main>
@endsection
