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
        <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
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
    <div class=" flex gap-2  ">
        <div class=" grow  p-12 text-center rounded-xl shadow-xl bg-black bg-opacity-40 ">
            <div class=" text-xl " >Time in must be</div>
            <div class=" text-3xl font-semibold " >{{date('h:i A', strtotime(Auth::user()->time_in_user))}}</div>
        </div>
        <div class=" grow  p-12 text-center rounded-xl shadow-xl bg-black bg-opacity-40 ">
            <div class=" text-xl " >Breaktime must be</div>
            <div class=" text-3xl font-semibold" >{{Auth::user()->break_duration}} mins</div>
        </div>
        <div class=" grow  p-12 text-center rounded-xl shadow-xl bg-black bg-opacity-40 ">
            <div class=" text-xl " >Time Out must be</div>
            <div class=" text-3xl font-semibold" >{{date('h:i A', strtotime(Auth::user()->time_out_user))}}</div>
        </div>
    </div>

    <div class=" relative pt-4 ">
        {{-- <form> --}}
        <div class=" mx-auto relative flex justify-center  flex-col max-w-md md:max-w-5xl gap-5  ">
            <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
                ATTENDANCE HISTORY
            </div>
            {{-- <x-attendance-card/> --}}

            <div class=" flex justify-end">
                <div class=" flex   w-fit   ">
                    <div class=" flex items-center px-2 ">
                        Filter By:
                    </div>

                    <div date-rangepicker id="FilterPicker" class=" flex items-center w-fit gap-2 px-2 ">
                        <div class="relative w-44  ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                </svg>
                            </div>

                            <select datepicker type="text"
                                class=" w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                                <option value=""></option>
                                <option value="Per Day">Per Day</option>
                                <option value="Per Week">Per Week</option>
                                <option value="Per Month">Per Month</option>
                                <option value="Per Year">Per Year</option>
                            </select>
                        </div>
                    </div>

                    {{-- Date Range Picker --}}
                    <div id="DateRangeFilter" date-rangepicker
                        class="flex items-center w-fit px-2 border-l border-l-slate-700">
                        <div id="DPRStart" class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3  pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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

            <table id="example" class="table is-striped text-white " style="width:100%">
                <thead>
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
                </thead>
                <tbody>

                    @foreach ($attendanceHistory as $key => $attendance)
                        <tr>
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
                                <td>{{ $attendance->time_in != null ? date_format(date_create($attendance->time_in), 'h:i:s a') : '--:--:--' }}
                                  <br/> <small class=" text-slate-400 " > {{ $attendance->time_in != null ? $attendance->time_in_comment : '--:--:--' }}</small>
                                </td>
                            @endif
                            @if ($sort == 'all' || $sort == 'break_in_out')
                                <td>{{ $attendance->break_in != null ? date_format(date_create($attendance->break_in), 'h:i:s a') : '--:--:--' }}
                                </td>
                            @endif
                            @if ($sort == 'all' || $sort == 'break_in_out')
                                <td>{{ $attendance->break_out != null ? date_format(date_create($attendance->break_out), 'h:i:s a') : '--:--:--' }}
                                    <br/> <small class=" text-slate-400 " > {{ $attendance->break_out != null ? $attendance->break_time_comment : '--:--:--' }}</small>
                                </td>
                            @endif
                            @if ($sort == 'all' || $sort == 'time_in_out')
                                <td>{{ $attendance->time_out != null ? date_format(date_create($attendance->time_out), 'h:i:s a') : '--:--:--' }}
                                    <br/> <small class=" text-slate-400 " > {{ $attendance->time_out != null ? $attendance->time_out_comment : '--:--:--' }}</small>
                                
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
            $("#DateRangeFilter, #DateFilter, #MonthFilter, #YearFilter, #FilterSubmitBtn").hide();
        });


        $(document).ready(function() {
            var filterMode
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
                filterMode = filterValue
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

            $("#FilterSubmitBtn").click(function(e) {
                e.preventDefault();
                startDateRemoveSlash = startDate.replace(/\//g, "-");
                endDateRemoveSlash = endDate.replace(/\//g, "-");
                var link = "/dashboard/history/<?php echo $sort; ?>/" + filterMode + "_" +
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



            $('#example').DataTable({
                dom: 'Bfrtip',
                "ordering": false,
                buttons: [{
                        text: 'All',
                        action: function() {
                            window.location.href = "/dashboard/history/all";
                        }
                    },
                    {
                        text: 'Time In - Time Out',
                        action: function() {
                            window.location.href = "/dashboard/history/time_in_out";
                        }
                    },
                    {
                        text: 'Break In - Break Out',
                        action: function() {
                            window.location.href = "/dashboard/history/break_in_out";
                        }
                    },
                    {
                        text: 'Total Hour',
                        action: function() {
                            window.location.href = "/dashboard/history/total_hour";
                        }
                    },
                    'copyHtml5',
                    {
                        extend: 'pdfHtml5',
                        title: '<?php echo Auth::user()->name; ?> Attendance History \n {{ $firstDate }} to {{ $lastDate }}',

                        text: 'PDF',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        customize: function(doc) {
                            console.log(doc.content);

                            doc.content.splice(0, 0, {
                                alignment: "center",
                                width: 300,
                                image: "{{ logo() }}"
                            });

                            doc.content.splice(1, 1, {
                                // position: 'absolute',
                                // right: 0,
                                // top: 0,
                                display: 'inline-block',
                                border: [true, true, true, true],
                                borderColor: '#000',
                                borderStyle: 'solid',
                                fontSize: 10,
                                margin: [15, 0, 0, 10],
                                text: "Name: <?php echo Auth::user()->name; ?> \n From {{ $firstDate }} to {{ $lastDate }}"
                            });





                            doc.content[2].table.widths = [
                                '20%',
                                '16%',
                                '16%',
                                '16%',
                                '16%',
                                '16%'
                            ]



                        },

                    },

                ],
                initComplete: function() {

                    var btns = $('.dt-button');
                    var btnsCon = $('.dt-buttons');
                    btns.removeClass('dt-button');
                    btns.addClass(
                        ' text-xs grow w-24 p-2 bg-gradient-to-t from-slate-800 hover:to-slate-800 hover:scale-110 hover:-translate-y-1 active:scale-100 active:translate-y-0 transition-all'
                    );
                    btnsCon.addClass(' w-full flex gap-2')
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
