@extends('dashboard')

<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet"
    crossorigin="anonymous" />

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

@section('style')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
@endsection

@section('content')
    @include('attendanceHistoryBase64')




    <div class="flex items-center justify-center w-full py-24 sm:py-8 px-4">
        <div class="w-full relative flex items-center justify-center">
            <button aria-label="slide backward"
                class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer"
                id="prev">
                <svg class="dark:text-white" width="30" height="36" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider"
                    class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                    {{-- <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table"
                            class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-white">Catalog 1
                            </h2>
                            <div class="flex h-full items-end pb-6">
                                <h3
                                    class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">
                                    Minimal Interior</h3>
                                <x-button type="submit" id="formSubmit">
                                    Read more
                                </x-button>
                            </div>
                        </div>
                    </div> --}}
                    @foreach ($announcements as $announcement)
                        <div class="flex flex-shrink-0 relative w-[300px] h-[500px] overflow-hidden">
                            <img src="{{ asset('storage/announcements/' . $announcement->image) }}" alt="{{ $announcement->title }}"
                                class="object-cover object-center w-full  " />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6 ">
                                <h2 class="lg:text-2xl leading-4 font-semibold text-base lg:leading-5 text-white dark:text-white">{{ $announcement->title }}
                                </h2>

                                <div class="flex h-fit w-full items-end pb-6 absolute bottom-0 left-0 flex-col ">
                                    <h3
                                        class=" w-full truncate  left-0 text-xl lg:text-xl leading-5 lg:leading-6 text-white dark:text-white">
                                        {{ Str::limit($announcement->description, 50, '...') }}</h3>

                                    <div>
                                        <form action="{{ route('announcementShow', $announcement->id) }}">
                                            <x-button type="submit" id="formSubmit">
                                                Read more
                                            </x-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button aria-label="slide forward"
                class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400"
                id="next">
                <svg class="dark:text-white" width="30" height="36" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>



    <script>
        let defaultTransform = 0;

        function goNext() {
            defaultTransform = defaultTransform - 398;
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        next.addEventListener("click", goNext);

        function goPrev() {
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
            else defaultTransform = defaultTransform + 398;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        prev.addEventListener("click", goPrev);
    </script>









    <br>













    @php

        function totalHour($time_in, $time_out, $break_in, $break_out)
        {
            $totalMorningWorkTime = '--';
            $totalAfternoonWorkTime = '--';

            if ($time_in != null && $break_in != null) {
                $timeIn = new DateTime($time_in);
                $breakIn = new DateTime($break_in);
                $morningWorkTime = $timeIn->diff($breakIn);
                $totalMorningWorkTime = $morningWorkTime->format('%H:%i:%s');
            }

            if ($break_out != null && $time_out != null) {
                $breakOut = new DateTime($break_out);
                $timeOut = new DateTime($time_out);
                $afternoonWorkTime = $breakOut->diff($timeOut);
                $totalAfternoonWorkTime = $afternoonWorkTime->format('%H:%i:%s');
            }

            if ($totalMorningWorkTime != '--' && $totalAfternoonWorkTime != '--') {
                $timeOut = new DateTime($time_out);
                $minusTime = $timeIn->diff($timeOut);
                $totalTime = $minusTime->format('%H:%i:%s');

                $breakIn = new DateTime($break_in);
                $breakOut = new DateTime($break_out);
                $minusBreakTime = $breakIn->diff($breakOut);
                $totalBreakTime = $minusBreakTime->format('%H:%i:%s');

                $totalBreakTime = new DateTime($totalBreakTime);
                $totalTime = new DateTime($totalTime);
                $minusTheBreakTime = $totalTime->diff($totalBreakTime);
                $totalTimeFinal = $minusTheBreakTime->format('%H:%i:%s');

                return $totalTimeFinal;
            }

            if ($totalMorningWorkTime != '--') {
                return $totalMorningWorkTime;
            }

            if ($totalAfternoonWorkTime != '--') {
                return $totalAfternoonWorkTime;
            }

            return '--:--:--';
        }

    @endphp
    @if ($status != null)
        <div id="alert-3"
            class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ $status }} </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif
    @if (session()->get('nextTimestamp') == 'Work Done')
        <div class=" flex gap-2 bg-black bg-opacity-40 rounded-xl shadow-xl">
            <div
                class=" text-transparent bg-clip-text bg-gradient-to-r to-[#02d397] from-[#06679b] font-semibold text-4xl py-12 text-center   w-full">
                "Great job! Your work for today is already finished."
            </div>
        </div>
    @elseif(session()->get('nextTimestamp') == 'On Leave')
        <div class=" flex gap-2 bg-black bg-opacity-40 rounded-xl shadow-xl">
            <div
                class=" text-transparent bg-clip-text bg-gradient-to-r to-[#02d397] from-[#06679b] font-semibold text-4xl py-12 text-center   w-full">
                "You're on leave today, enjoy your day off and take some time to relax and recharge!"
            </div>
        </div>
    @elseif(session()->get('nextTimestamp') == 'No Work Today')
        <div class=" flex gap-2 bg-black bg-opacity-40 rounded-xl shadow-xl">
            <div
                class=" text-transparent bg-clip-text bg-gradient-to-r to-[#02d397] from-[#06679b] font-semibold text-4xl py-12 text-center   w-full">
                "You have no work scheduled for today! Enjoy your day off."
            </div>
        </div>
    @else
        <div class=" flex gap-2  ">
            <div class=" grow  p-12 text-center rounded-xl shadow-xl bg-black bg-opacity-40 ">
                <div class=" Ftext-xl ">Time in must be</div>
                <div class=" text-3xl font-semibold ">{{ date('h:i A', strtotime(Auth::user()->time_in_user)) }}</div>
            </div>
            <div class=" grow  p-12 text-center rounded-xl shadow-xl bg-black bg-opacity-40 ">
                <div class=" text-xl ">Breaktime must be</div>
                <div class=" text-3xl font-semibold">{{ Auth::user()->break_duration }} mins</div>
            </div>
            <div class=" grow  p-12 text-center rounded-xl shadow-xl bg-black bg-opacity-40 ">
                <div class=" text-xl ">Time Out must be</div>
                <div class=" text-3xl font-semibold">{{ date('h:i A', strtotime(Auth::user()->time_out_user)) }}</div>
            </div>
        </div>
    @endif


    <div class=" relative pt-4 ">
        {{-- <form> --}}
        <div class=" mx-auto relative flex justify-center  flex-col max-w-md md:max-w-5xl gap-5  ">
            <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
                ATTENDANCE HISTORY
            </div>
            {{-- <x-attendance-card/> --}}

            <div
                class=" md:flex flex flex-col items-end md:flex-row 
            @if (session()->get('nextTimestamp') != 'Work Done' &&
                    session()->get('nextTimestamp') != 'On Leave' &&
                    session()->get('nextTimestamp') != 'No Work Today') md:justify-between 
            @else
            md:justify-end @endif
            ">

                @if (session()->get('nextTimestamp') != 'Work Done' &&
                        session()->get('nextTimestamp') != 'On Leave' &&
                        session()->get('nextTimestamp') != 'No Work Today')
                    <div data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class=" cursor-pointer md:mb-0 mb-4 md:relative md:top-[61px] z-30 text-center text-md font-semibold w-32 p-2 bg-gradient-to-t from-slate-800 hover:to-slate-800 hover:scale-110 hover:-translate-y-1 active:scale-100 active:translate-y-0 transition-all">
                        <div class=" relative  inline-block mx-2">
                            <div class=" absolute inline-block h-3 w-3 bg-[#75B33E] rounded-full animate-ping  ">
                            </div>
                            <div class="  inline-block h-3 w-3 bg-[#75B33E] rounded-full animate-pulse  ">
                            </div>
                        </div>

                        {{ session()->get('nextTimestamp') }}
                    </div>
                @endif


                <div class=" flex   w-fit   ">

                    <div class=" flex items-center px-2 ">
                        Filter By:
                    </div>

                    <div date-rangepicker id="FilterPicker" class=" flex items-center w-fit gap-2 px-2 ">
                        <div class="relative w-44  ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                </svg>
                            </div>
                            <select datepicker type="text"
                                class=" w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                                @if ($filter != '' && $filter != 'all')
                                    <option value="removeFilter">Remove Filter</option>
                                @else
                                    <option value=""></option>
                                @endif
                                <option value="Per Day" @selected($filter == 'Per Day')>Per Day</option>
                                <option value="Per Week" @selected($filter == 'Per Week')>Per Week</option>
                                <option value="Per Month" @selected($filter == 'Per Month')>Per Month</option>
                                <option value="Per Year" @selected($filter == 'Per Year')>Per Year</option>
                            </select>
                        </div>
                    </div>

                    {{-- Column Filter --}}
                    <div date-rangepicker id="columnFilterCon" class=" flex items-center w-fit gap-2 px-2 ">
                        <div class="relative w-44  ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-layout-three-columns" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5H5V1H1.5zM10 15V1H6v14h4zm1 0h3.5a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5H11v14z" />
                                </svg>
                            </div>

                            <select id="columnFilter" datepicker type="text"
                                class=" w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                                <option value="all" selected>All column</option>
                                <option value="time_in_out">Time in & out</option>
                                <option value="break_in_out">Break in & out</option>
                                <option value="total_hour">Total Hour</option>
                            </select>
                        </div>
                    </div>


                    {{-- Date Range Picker --}}
                    <div id="DateRangeFilter" date-rangepicker
                        class="flex items-center w-fit px-2 border-l border-l-slate-700">
                        <div id="DPRStart" class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3  pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="DateRangeFilterStart" name="start" type="text"
                                class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>

                        <span class="mx-4 text-gray-500">to</span>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="DateRangeFilterEnd" name="end" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end">
                        </div>
                    </div>

                    {{-- Date Picker --}}
                    <div id="DateFilter" class="border-l border-l-slate-700 relative max-w-sm px-2 ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker id="DateFilterDay" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date">
                    </div>

                    {{-- Month Year --}}
                    <div id="MonthFilter" date-rangepicker
                        class="flex items-center w-fit gap-2 px-2 border-l border-l-slate-700">
                        <div class="relative w-44  ">

                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>

                            <select id="MonthFilterMonth" datepicker type="text"
                                class=" w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                                <option value="" selected class=" bg-slate-600 ">--Select month--</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="relative w-44  ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                            </div>
                            <input id="MonthFilterYear" value="{{ date('Y') }}" min="1900" max="2099"
                                maxlength="4" step="1" type="number"
                                class=" no-arrow w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select year" />
                        </div>
                    </div>


                    {{-- Year --}}
                    <div id="YearFilter" class="relative w-44 px-2 border-l border-l-slate-700">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                        </div>
                        <input value="" min="1900" max="2099" maxlength="4" step="1"
                            id="YearFilterYear" type="number"
                            class=" no-arrow w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select year" />
                    </div>

                    {{-- Submit Button --}}
                    <div id="FilterSubmitBtn" class="relative w-44 px-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                        </div>
                        <input value="Apply" id="YearForMonth" type="submit"
                            class=" h-full text-md rounded-lg w-full  grow cursor-pointer  p-2 bg-gradient-to-t from-slate-800 hover:to-slate-800 hover:scale-110 hover:-translate-y-1 active:scale-100 active:translate-y-0 transition-all" />
                    </div>
                </div>
            </div>
           


            <table id="example" class=" table is-striped text-white " style="width:100%">
                <thead>
                    <tr>
                        <th >Date</th>
                        @if ($sort == 'all' || $sort == 'time_in_out')
                            <th>Time In</th>
                        @endif
                        @if ($sort == 'all' || $sort == 'break_in_out')
                            <th>Break In</th>
                        @endif
                        @if ($sort == 'all' || $sort == 'break_in_out')
                            <th>Break Out</th>
                        @endif
                        @if ($sort == 'all' || $sort == 'time_in_out')
                            <th>Time Out</th>
                        @endif
                        @if ($sort == 'all' || $sort == 'total_hour')
                            <th>Total Hour</th>
                        @endif
                    </tr>
                </thead>
                <tbody>

                    @foreach ($attendanceHistory as $key => $attendance)
                        <tr class="table-bordered">
                            {{-- {{dd($sort)}} --}}
                            <td class=" relative ">
                                @if ($key == 0 && date('Y/m/d') == date_format(date_create($attendance->created_at), 'Y/m/d'))
                                    <span
                                        @if (session()->get('nextTimestamp') != 'Work Done') data-modal-target="authentication-modal"
                                            data-modal-toggle="authentication-modal" @endif
                                        class=" absolute -left-16 flex cursor-pointer animate-pulse">
                                        <div class="bg-[#75B33E] px-1 rounded-r-[5px] font-semibold ">Today
                                        </div>

                                        <svg class="text-[#75B33E] relative -left-[8px] "
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                        </svg>
                                    </span>
                                @endif

                                {{ date_format(date_create($attendance->created_at), 'M d, Y') }}
                            </td>

                            @if ($sort == 'all' || $sort == 'time_in_out')
                                <td class="flex gap-1 ">
                                    @if ($attendance->time_in_image != null)
                                        <a href="{{ asset('storage/images/timestamp/' . $attendance->time_in_image) }}"
                                            target="_blank">
                                            <img class=" w-24 h-16 object-cover "
                                                src="{{ asset('storage/images/timestamp/' . $attendance->time_in_image) }}" />
                                        </a>
                                    @endif
                                    <div class=" flex items-start flex-col justify-center ">
                                        {{ $attendance->time_in != null ? date_format(date_create($attendance->time_in), 'h:i:s a') : '--:--:--' }}
                                        <br /> <small class=" text-slate-400 ">
                                            {{ $attendance->time_in != null ? $attendance->time_in_comment : '' }}</small>
                                    </div>
                                </td>
                            @endif


                            @if ($sort == 'all' || $sort == 'break_in_out')
                                <td>{{ $attendance->break_in != null ? date_format(date_create($attendance->break_in), 'h:i:s a') : '--:--:--' }}
                                </td>
                            @endif
                            @if ($sort == 'all' || $sort == 'break_in_out')
                                <td>{{ $attendance->break_out != null ? date_format(date_create($attendance->break_out), 'h:i:s a') : '--:--:--' }}
                                    <br /> <small class=" text-slate-400 ">
                                        {{ $attendance->break_out != null ? $attendance->break_time_comment : '' }}</small>
                                </td>
                            @endif

                            @if ($sort == 'all' || $sort == 'time_in_out')
                                <td>
                                    <div class="flex gap-1">
                                        @if ($attendance->time_out_image != null)
                                            <a href="{{ asset('storage/images/timestamp/' . $attendance->time_out_image) }}"
                                                target="_blank">
                                                <img class=" w-24 h-16 object-cover "
                                                    src="{{ asset('storage/images/timestamp/' . $attendance->time_out_image) }}" />
                                            </a>
                                        @endif
                                        <div class=" flex items-start flex-col justify-center ">
                                            {{ $attendance->time_out != null ? date_format(date_create($attendance->time_out), 'h:i:s a') : '--:--:--' }}
                                            <br /> <small class=" text-slate-400 ">
                                                {{ $attendance->time_out != null ? $attendance->time_out_comment : '' }}</small>
                                        </div>
                                    </div>
                                </td>
                            @endif
                            @if ($sort == 'all' || $sort == 'total_hour')
                                <td>
                                    {{ totalHour($attendance->time_in, $attendance->time_out, $attendance->break_in, $attendance->break_out) }}
                                </td>
                            @endif
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        @if ($sort == 'all' || $sort == 'time_in_out')
                            <th>Time In</th>
                        @endif
                        @if ($sort == 'all' || $sort == 'break_in_out')
                            <th>Break In</th>
                        @endif
                        @if ($sort == 'all' || $sort == 'break_in_out')
                            <th>Break Out</th>
                        @endif
                        @if ($sort == 'all' || $sort == 'time_in_out')
                            <th>Time Out</th>
                        @endif
                        @if ($sort == 'all' || $sort == 'total_hour')
                            <th>Total Hour</th>
                        @endif
                    </tr>
                </tfoot>
            </table>
        </div>
        {{-- </form> --}}

    </div>

    <script>
        $(document).ready(function() {
            $(" #columnFilterCon, #DateRangeFilter, #DateFilter, #MonthFilter, #YearFilter, #FilterSubmitBtn")
                .hide();
        });

        $(document).ready(function() {
            var filterMode
            var filterColumn = "all"
            var startDate
            var endDate

            function getLastDayOfMonth(month) {
                var date = new Date();
                date.setMonth(month);
                var lastDayOfMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                var lastDayOfMonthValue = lastDayOfMonth.getDate();
                return lastDayOfMonthValue;
            }


            $("#FilterPicker").change(function(e) {
                $("#DateRangeFilter, #DateFilter, #MonthFilter, #YearFilter, #FilterSubmitBtn").hide();
                e.preventDefault();

                var filterValue = e.target.value;

                if (filterValue != "") {
                    $("#columnFilterCon").show();
                } else {
                    $("#columnFilterCon").hide();
                }

                filterMode = filterValue
                console.log(filterValue)
                if (filterValue == "removeFilter") {
                    window.location.href = "/dashboard/history/all";
                }

                if (filterValue == "Per Day") {
                    $("#DateFilter, #FilterSubmitBtn").show("500");
                    $(".datepicker").on("click", function() {
                        var DateRangeFilterStart = $('#DateFilterDay').val();
                        var DateRangeFilterEnd = $('#DateFilterDay').val();
                        startDate = DateRangeFilterStart;
                        endDate = DateRangeFilterEnd;
                    });
                }
                if (filterValue == "Per Week") {
                    $("#DateRangeFilter, #FilterSubmitBtn").show("500");
                    $(".datepicker").on("click", function() {
                        var DateRangeFilterStart = $('#DateRangeFilterStart').val();
                        var DateRangeFilterEnd = $('#DateRangeFilterEnd').val();
                        startDate = DateRangeFilterStart;
                        endDate = DateRangeFilterEnd;
                    });
                }
                if (filterValue == "Per Month") {
                    $("#MonthFilter, #FilterSubmitBtn").show("500");
                    var month = "01"
                    var year = "<?php echo date('Y'); ?>"

                    $('#MonthFilterMonth').change(function(e) {
                        month = $(this).val()
                        startDate = month + '/01/' + year;
                        endDate = month + '/' + getLastDayOfMonth(month - 1) + '/' + year;
                    });

                    $("#MonthFilterYear").keyup(function(e) {
                        year = $(this).val()
                        startDate = month + '/01/' + year;
                        endDate = month + '/' + getLastDayOfMonth(month - 1) + '/' + year;
                    });

                }
                if (filterValue == "Per Year") {
                    $("#YearFilter, #FilterSubmitBtn").show("500");

                    $("#YearFilterYear").keyup(function(e) {
                        year = $(this).val()
                        startDate = '01/01/' + year;
                        endDate = '12/' + getLastDayOfMonth(11) + '/' + year;

                    });
                }

            });

            $("#columnFilter").change(function(e) {
                e.preventDefault();
                filterColumn = e.target.value
                console.log(filterColumn)
            });

            $("#FilterSubmitBtn").click(function(e) {
                e.preventDefault();
                startDateRemoveSlash = startDate.replace(/\//g, "-");
                endDateRemoveSlash = endDate.replace(/\//g, "-");
                var link = "/dashboard/history/" + filterColumn + "/" + filterMode + "_" +
                    startDateRemoveSlash + "_" + endDateRemoveSlash;
                window.location.href = link;
            });


        });

        // limit year into 4 characters
        $(document).ready(function() {
            $('#MonthFilterYear, #YearFilterYear').on('input', function() {
                var val = $(this).val();
                $(this).val(val.substr(0, 4));
            });
        });

        $(document).ready(function() {



            var table = $('#example').DataTable({
                "rowCallback": function(row, data) {
                    $(row).css('border', '1px solid white');
                },
                dom: 'Bfrtip',
                "ordering": false,
                buttons: [
                    // 'print',
                    // {
                    //     text: 'All',
                    //     action: function() {
                    //         window.location.href = "/dashboard/history/all";
                    //     }
                    // },
                    // {
                    //     text: 'Time In-Out',
                    //     action: function() {
                    //         window.location.href = "/dashboard/history/time_in_out";
                    //     }
                    // },
                    // {
                    //     text: 'Break In-Out',
                    //     action: function() {
                    //         window.location.href = "/dashboard/history/break_in_out";
                    //     }
                    // },
                    // {
                    //     text: 'Total Hour',
                    //     action: function() {
                    //         window.location.href = "/dashboard/history/total_hour";
                    //     }
                    // },
                    'copyHtml5',
                    {
                        download: 'open',
                        extend: 'pdfHtml5',
                        title: '<?php echo Auth::user()->name; ?> Attendance History \n {{ $firstDate }} to {{ $lastDate }}',

                        text: 'Export to PDF',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        customize: function(doc) {
                            console.log(doc.content);

                            doc.content.splice(0, 0, {
                                alignment: "center",
                                width: 500,
                                image: "{{ logo() }}"
                            });

                            doc.content.splice(1, 1, {
                                alignment: "center",
                                border: [true, true, true, true],
                                borderColor: '#000',
                                borderStyle: 'solid',
                                fontSize: 10,
                                margin: [15, 0, 0, 10],
                                text: "From {{ $firstDate }} to {{ $lastDate }} \n Name: <?php echo Auth::user()->name; ?> "
                            });



                            var numCols = table.columns().count();

                            var columnWidth = 100 / numCols + "%"

                            doc.content[2].table.widths = Array(doc.content[2].table.body[0]
                                .length + 1).join('*').split('');
                            doc.content[2].alignment = 'center';

                            doc.content[2].table.widths = [
                                columnWidth,
                                columnWidth,
                                columnWidth,
                                columnWidth,
                                columnWidth,
                                columnWidth
                            ]


                        },

                    },

                ],
                initComplete: function() {
                    var rowOdd = $('.odd');
                    var rowEven = $('.even');
                    var btns = $('.dt-button');
                    var btnsCon = $('.dt-buttons');

                    rowOdd.removeClass('odd')
                    rowEven.removeClass('even')


                    btns.removeClass('dt-button');
                    btns.addClass(
                        ' text-md  w-32 p-2 bg-gradient-to-t from-slate-800 hover:to-slate-800 hover:scale-110 hover:-translate-y-1 active:scale-100 active:translate-y-0 transition-all'
                    );
                    btnsCon.addClass(' w-full flex gap-2 justify-end')
                    $('#example_filter').addClass('hidden');



                }
            });




        });
    </script>
    <style>
        .no-arrow {
            -moz-appearance: textfield;
        }

        .no-arrow::-webkit-outer-spin-button,
        .no-arrow::-webkit-inner-spin-button {
            display: none;
        }
    </style>
@endsection
