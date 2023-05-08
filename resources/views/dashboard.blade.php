<x-app-layout>
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800">
            <a class="flex items-center pl-2.5 mb-5 mt-1">
                <img src="{{ asset('images/logo.png') }}" class="h-6 mr-3 sm:h-7" alt="Marvill Logo" />
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class=" flex items-center p-2 rounded-lg text-white hover:bg-gray-700">
                        <svg aria-hidden="true"
                            class="w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3  ">Dashboard</span>
                    </a>
                </li>
                {{-- <li>
                    @if (session()->get('nextTimestamp') == 'Work Done' ||
                            session()->get('nextTimestamp') == 'On Leave' ||
                            session()->get('nextTimestamp') == 'No Work Today')
                        <div
                            class=" cursor-not-allowed flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">{{ session()->get('nextTimestamp') }}</span>
                        </div>
                    @else
                        <div data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class=" cursor-pointer flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">
                                @if (session()->get('nextTimestamp') == 'Break In')
                                    Start Breaktime
                                @elseif(session()->get('nextTimestamp') == 'Break Out')
                                    End Breaktime
                                @else
                                    {{ session()->get('nextTimestamp') }}
                                @endif


                            </span>
                        </div>
                    @endif
                </li> --}}
                </a>
                </li>
                {{-- <li>
                    <a href="{{ route('breakTime') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.25 9v6m-4.5 0V9M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Break Time</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('employeeDocs') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg fill="none"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Employee Documents</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('summaryAttendance') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg fill="none"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Summary of Attendance</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('userIndex') }}"
                        class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Leaves</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('userCreate') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg fill="none"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Request Leave Form</span>
                    </a>
                </li> --}}
            </ul>

        </div>

    </aside>



    <div class="p-4 sm:ml-64 my-auto relative  ">



        <div class="p-4 text-white ">
            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class=" fixed left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full  ">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">

                            <div class=" relative ">
                                <form action={{ route('timestamp.store') }} method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class=" mx-auto  flex justify-center flex-col items-center max-w-md gap-8 ">
                                        <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] ">
                                            @if (session()->get('nextTimestamp') == 'Break In')
                                                Start Breaktime
                                            @elseif(session()->get('nextTimestamp') == 'Break Out')
                                                End Breaktime
                                            @else
                                                {{ session()->get('nextTimestamp') }}
                                            @endif
                                        </div>

                                        <div class=" flex justify-center  w-full flex-col ">
                                            <div class=" text-center text-xl font-semibold mb-3 ">
                                                {{ date('M d, Y') }}
                                            </div>
                                            <div class="relative flex items-start mb-10 justify-center">
                                                <div
                                                    class="text-sm md:text-5xl text-white w-[350px] justify-center text-center">
                                                    <p class="font-light text-2xl leading-loose">Current time:</p>
                                                    <h3 id="clock"></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" gap-4 w-full justify-center ">

                                            @if (session()->get('nextTimestamp') == 'Time In' || session()->get('nextTimestamp') == 'Time Out')
                                                <img id="imgPreview" src="#" alt="pic" class=" mb-4 m-auto " />
                                                <input required id="image" name="image" type="file"
                                                    class=" hidden " accept="image/png, image/gif, image/jpeg" />
                                                <div id="imageWarning"
                                                    class=" text-center text-xl text-red-300 font-semibold ">
                                                    *Please upload an image
                                                </div>
                                                <div for="image"
                                                    class=" cursor-pointer mb-4 hover:shadow-xl overflow-hidden bg-[#8EC33F] hover:bg-[#b3db77] font-[900] text-[25px] rounded-full grow text-center transition-all hover:scale-110 hover:-translate-y-2 active:shadow active:scale-100 active:-translate-x-0 ">
                                                    <label for="image" required class=" w-full block ">
                                                        Upload Image
                                                    </label>

                                                </div>
                                            @endif

                                            <div
                                                class=" hover:shadow-xl overflow-hidden bg-[#8EC33F] hover:bg-[#b3db77] font-[900] text-[25px] rounded-full grow text-center transition-all hover:scale-110 hover:-translate-y-2 active:shadow active:scale-100 active:-translate-x-0 ">
                                                <button type="submit"
                                                    @if (session()->get('nextTimestamp') == 'Time In' || session()->get('nextTimestamp') == 'Time Out') id="submitBtn" @endif
                                                    class=" p-1 w-full ">
                                                    @if (session()->get('nextTimestamp') == 'Time In')
                                                        Present!
                                                    @elseif (session()->get('nextTimestamp') == 'Break In')
                                                        Take a break
                                                    @elseif (session()->get('nextTimestamp') == 'Break Out')
                                                        Break done
                                                    @else
                                                        Goodbye!
                                                    @endif
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <x-welcome /> --}}
            @yield('content')
        </div>
    </div>
    <script type="text/javascript">
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

            $('#submitBtn').click(function(e) {

                if (hasImage == false) {
                    $("#imageWarning").show();
                    $("#imageWarning").addClass('animate-bounce');
                    e.preventDefault();
                }

            });
        });

        // set the modal menu element
        const $targetEl = document.getElementById('authentication-modal');

        // options with default values
        const options = {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900 bg-opacity-80 fixed inset-0 z-40',
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

        setInterval(displayclock, 500);

        function displayclock() {
            var time = new Date();
            var hrs = time.getHours();
            var min = time.getMinutes();
            var sec = time.getSeconds();
            var en = 'AM';
            if (hrs > 12) {
                en = 'PM';
            }
            if (hrs > 12) {
                hrs = hrs - 12;
            }
            if (hrs == 0) {
                hrs = 12;
            }
            if (hrs < 10) {
                hrs = '0' + hrs;
            }
            if (min < 10) {
                min = '0' + min;
            }
            if (sec < 10) {
                sec = '0' + sec;
            }
            document.getElementById("clock").innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
        }

        let dateToday = document.getElementById("date-today");
        let today = new Date();
        let day = `${today.getDate() < 10 ? "0" : ""}${today.getDate()}`;
        let month = `${(today.getMonth() + 1 ) < 10 ? "0" : ""}${today.getMonth() + 1}`;
        let year = today.getFullYear();
        dateToday.textContent = `${day}-${month}-${year}`;
    </script>



</x-app-layout>
