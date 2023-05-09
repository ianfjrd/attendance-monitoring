@extends('admin.admindashboard')

@section('content')
    <div class=" mx-auto  flex justify-center flex-col items-center max-w-md md:max-w-5xl gap-5 ">
        <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
            Create Role
        </div>
        <form id="editRoleForm" method="POST" action="{{route('role.update', $role->id)}}">
            @csrf
            @method('PATCH')
            <div class="flex flex-col justify-center items-center text-center">
                <label class=" text-[#8EC33F] font-bold text-2xl">Name</label>
                <input id="name"
                    class=" text-center block py-2.5 px-0 w-1/2 text-2xl bg-transparent border-0 border-b-2 appearance-none text-white border-[#8EC33F] focus:outline-none focus:ring-0 focus:border-[#8EC33F] peer"
                    type="text" name="name" required autofocus value="{{ old('name', $role->name) }}" autocomplete="name"
                    placeholder="Admin" />
                @error('name')
                    <small class=" italic text-red-400 ">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex justify-center items-center py-10">
                <button type="submit" id="formSubmit"
                    class="text-xl bg-[#8EC33F] hover:bg-[#7cb62f] text-white font-bold py-2 px-4 rounded-full">
                    Submit
                </button>
            </div>
        </form>

    </div>
@endsection
