@extends('dashboard')
@section('style')
    <style>
        input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(100%) brightness(95%) contrast(80%);
        }
    </style>
@endsection
@section('content')
    <div class="flex justify-center items-center">
        <label for="title" class="text-4xl font-bold dark:text-white pt-5 pb-5">{{ $announcement->title }}</label>
    </div>

    <div class="relative w-100% h-[300px] overflow-hidden" data-modal-target="image-modal" data-modal-toggle="image-modal">
        <img class="absolute inset-0 object-cover w-full h-full"
            src="{{ asset('storage/announcements/' . $announcement->image) }}" alt="{{ $announcement->title }}">
    </div>

    <div class="flex justify-center items-center" wid>
        <label for="title"
            class="text-4x1 text-xl lg:text-xl font-lite text-justify dark:text-white pt-5 pb-10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $announcement->description }}
        </label>
    </div>

    {{-- Image Modal --}}
    <div class="p-4 sm:ml-64 my-auto relative">
        <div class="p-4  dark:text-white ">
            <!-- Image modal -->
            <div id="image-modal" tabindex="-1" aria-hidden="true"
                class=" fixed left-0 right-0 z-50 hidden  w-full p-4 overflow-x-hidden overflow-y-auto sm:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-[80%] max-h-[80%]  ">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        
                        <div class="px-6 py-6 lg:px-8">
                            <div class=" relative ">
                                <div class=" mx-auto  flex justify-center flex-col items-center max-w-[80%] max-h-[80%] gap-8 ">
                                    <div>
                                        <img class="w-[auto] h-[100%]"
                                            src="{{ asset('storage/announcements/' . $announcement->image) }}"
                                            alt="{{ $announcement->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="image-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- <x-welcome /> --}}
            @yield('content')
        </div>
    </div>

    {{-- Image Script --}}
    <script type="text/javascript">
        // set the modal menu element
        const $targetEl = document.getElementById('image-modal');

        // options with default values
        const options = {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
            closable: true,
            onHide: () => {
                console.log('modal is hidden');
            },
            onShow: () => {
                console.log('modal is shown');
            },
            onToggle: () => {
                console.log('modal has been toggled');
            }
        };
        const modal = new Modal($targetEl, options);
    </script>
@endsection
