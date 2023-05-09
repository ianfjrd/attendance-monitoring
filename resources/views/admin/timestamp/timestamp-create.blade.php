@extends('admin.admindashboard')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@section('style')
    <style>
        input[type="datetime-local"]::-webkit-calendar-picker-indicator {
            filter: invert(100%) brightness(95%) contrast(80%);
        }
    </style>
@endsection
@section('content')
    <div class="flex justify-center items-center">
        <label for="title" class="text-4xl font-bold text-white pt-5 pb-10">Add timestamp Form</label>
    </div>
    <form action="{{ route('timestampCreateAdmin') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col justify-center items-center text-center">
            <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
            <select type="text" name="user_id" id="floating_first_name"
                class=" text-center block py-2.5 px-0 w-1/4 text-2xl bg-transparent border-0 border-b-2 appearance-none text-white border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
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
            <div>
                {{-- Time In Image --}}
                <div class="flex flex-col text-center items-center justify-center ">
                    <img id="imgPreview" src="#" alt="pic" class=" mb-4 h-52 w-72 m-4 object-cover " />
                    <input required id="image" name="image" type="file" class=" hidden "
                        accept="image/png, image/gif, image/jpeg" />
                    <div id="imageWarning" class=" text-center text-xl text-red-300 font-semibold ">
                        *Please upload an image
                    </div>
                    <div for="image"
                        class=" mt-8 px-6 hover:shadow-xl overflow-hidden bg-[#8EC33F] hover:bg-[#b3db77] font-[900] text-[25px] rounded-full text-center transition-all hover:scale-110 hover:-translate-y-2 active:shadow active:scale-100 active:-translate-x-0 ">
                        <label for="image" required class=" w-full block p-4 cursor-pointer ">
                            Upload Image
                            <small class="block">(For time in)</small>
                        </label>
                    </div>
                    @error('image')
                        <small class=" italic text-red-400 mb-4 text-lg">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-col text-center items-center justify-center mt-8">
                    <label class="text-[#8EC33F] font-bold text-2xl">Time In</label>
                    <input type="datetime-local" name="time_in" value="{{ old('time_in') }}"
                        class="border-0 border-b-2 text-white bg-transparent text-2xl w-1/2 mb-1 px-0 block py-2.5 appearance-none border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                    @error('time_in')
                        <small class=" italic text-red-400 mb-4">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div>
                {{-- Time Out Image --}}
                <div class="flex flex-col text-center items-center justify-center">
                    <img id="imgPreview1" src="#" alt="pic" class=" mb-4 h-52 w-72 m-4 object-cover " />
                    <input required id="image1" name="image1" type="file" class=" hidden "
                        accept="image/png, image/gif, image/jpeg" />
                    <div id="imageWarning1" class=" text-center text-xl text-red-300 font-semibold ">
                        *Please upload an image
                    </div>
                    <div for="image1"
                        class=" mt-8 px-6  hover:shadow-xl overflow-hidden bg-[#8EC33F] hover:bg-[#b3db77] font-[900] text-[25px] rounded-full text-center transition-all hover:scale-110 hover:-translate-y-2 active:shadow active:scale-100 active:-translate-x-0 ">
                        <label for="image1" required class=" w-full block p-4 cursor-pointer ">
                            Upload Image
                            <small class="block">(For time out)</small>
                        </label>

                    </div>
                    @error('image1')
                        <small class=" italic text-red-400 mb-4 text-lg">{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-col text-center items-center justify-center mt-8">
                    <label class="text-[#8EC33F] font-bold text-2xl">Time Out</label>
                    <input type="datetime-local" name="time_out" value="{{ old('time_out') }}"
                        class="border-0 border-b-2 text-white bg-transparent text-2xl w-1/2 mb-1 px-0 block py-2.5 appearance-none border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                    @error('time_out')
                        <small class=" italic text-red-400 mb-4">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2">
            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Break In</label>
                <input type="datetime-local" name="break_in" value="{{ old('break_in') }}"
                    class="border-0 border-b-2 text-white bg-transparent text-2xl w-1/2 mb-1 px-0 block py-2.5 appearance-none border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                @error('break_in')
                    <small class=" italic text-red-400 mb-4">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col text-center items-center justify-center">
                <label class="text-[#8EC33F] font-bold text-2xl">Break Out</label>
                <input type="datetime-local" name="break_out" value="{{ old('break_out') }}"
                    class="border-0 border-b-2 text-white bg-transparent text-2xl w-1/2 mb-1 px-0 block py-2.5 appearance-none border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer" />
                @error('break_out')
                    <small class=" italic text-red-400 mb-4">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="flex justify-center items-center py-10">
            <button id="submitBtn" type="submit"
                class="text-xl bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
                Add Form
            </button>
        </div>
    </form>


    <script>
        $(document).ready(function() {

            var hasImage = false

            $("#imgPreview").hide();
            $("#imageWarning").hide();
            $("#image").change(function() {
                const file = this.files[0];
                if (file) {
                    $("#imgPreview").show();
                    $("#imageWarning").hide();
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        hasImage = true
                        $("#imgPreview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    hasImage = false
                    $("#imgPreview").hide();
                }
            });



            var hasImage1 = false

            $("#imgPreview1").hide();
            $("#imageWarning1").hide();
            $("#image1").change(function() {
                console.log("asdasd");
                const file1 = this.files[0];
                if (file1) {
                    $("#imgPreview1").show();
                    $("#imageWarning1").hide();
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        hasImage1 = true
                        $("#imgPreview1")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file1);
                } else {
                    hasImage1 = false
                    $("#imgPreview1").hide();
                }
            });


            $('#submitBtn').click(function(e) {

                if (hasImage == false) {
                    $("#imageWarning").show();
                    $("#imageWarning").addClass('animate-bounce');
                    e.preventDefault();
                }

                if (hasImage1 == false) {
                    $("#imageWarning1").show();
                    $("#imageWarning1").addClass('animate-bounce');
                    e.preventDefault();
                }

            });
        });
    </script>
@endsection
