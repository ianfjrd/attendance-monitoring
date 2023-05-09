@extends('admin.admindashboard')

@section('content')
    <div class=" mx-auto  flex justify-center flex-col items-center max-w-md md:max-w-5xl gap-5 ">
        <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
            Role
        </div>

        <div class="flex flex-col justify-center items-center text-center">
            <label class=" text-[#8EC33F] font-bold text-2xl">ID</label>
            <input id="id" disabled
                class=" text-center block py-2.5 px-0 w-1/2 text-2xl bg-transparent border-0 border-b-2 border-gray-300 appearance-none text-white border-[transparent] focus:outline-none focus:ring-0 focus:border-[transparent] peer"
                type="text" name="id" value="{{ old('name', $role->id) }}" required autofocus placeholder="1"/>
        </div>

        <div class="flex flex-col justify-center items-center text-center">
            <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
            <input id="name" disabled
                class=" text-center block py-2.5 px-0 w-1/2 text-2xl bg-transparent border-0 border-b-2 border-gray-300 appearance-none text-white border-[transparent] focus:outline-none focus:ring-0 focus:border-[transparent] peer"
                type="text" name="name" value="{{ old('name', $role->name) }}" required autofocus placeholder="Admin" />
        </div>

        <div class="flex justify-center items-center py-10">
            <a href="{{route('role.edit', $role->id)}}"
                class="text-xl bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
                Edit
            </a>
        </div>

    </div>
@endsection
