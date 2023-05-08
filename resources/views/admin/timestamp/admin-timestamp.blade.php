@extends('admin.admindashboard')

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


@section('content')
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
    <div class=" relative pt-4 ">

        <div class=" mx-auto  flex justify-center flex-col items-center max-w-md md:max-w-5xl gap-5 ">
            <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
                TIMESTAMP LIST (Admin)
            </div>
            {{-- <x-attendance-card/> --}}

            <table id="example" class="table is-striped text-white " style="width:70vw">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Break In</th>
                        <th>Break Out</th>
                        <th>Time Out</th>
                        <th>Total Hour</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timestamps as $timestamp)
                        <tr>
                            <td>{{ $timestamp->user->name }}</td>
                            <td> {{ date_format(date_create($timestamp->created_at), 'M d, Y') }}</td>


                            <td class="flex gap-1 ">
                                @if ($timestamp->time_in_image != null)
                                    <a href="{{ asset('storage/images/timestamp/' . $timestamp->time_in_image) }}"
                                        target="_blank">
                                        <img class=" w-24 h-16 object-cover "
                                            src="{{ asset('storage/images/timestamp/' . $timestamp->time_in_image) }}" />
                                    </a>
                                @endif
                                <div class=" flex items-start flex-col justify-center ml-2 ">
                                    {{ $timestamp->time_in != null ? date_format(date_create($timestamp->time_in), 'h:i:s a') : '--:--:--' }}
                                    <br /> <small class=" text-slate-400 ">
                                        {{ $timestamp->time_in != null ? $timestamp->time_in_comment : '' }}</small>
                                </div>
                            </td>




                            <td>{{ $timestamp->break_in != null ? date_format(date_create($timestamp->break_in), 'h:i:s a') : '--:--:--' }}
                            </td>
                            <td>{{ $timestamp->break_out != null ? date_format(date_create($timestamp->break_out), 'h:i:s a') : '--:--:--' }}
                                <br /> <small class=" text-slate-400 ">
                                    {{ $timestamp->break_out != null ? $timestamp->break_time_comment : '--:--:--' }}</small>
                            </td>

                            <td>
                                <div class="flex gap-1">
                                    @if ($timestamp->time_out_image != null)
                                        <a href="{{ asset('storage/images/timestamp/' . $timestamp->time_out_image) }}"
                                            target="_blank">
                                            <img class=" w-24 h-16 object-cover "
                                                src="{{ asset('storage/images/timestamp/' . $timestamp->time_out_image) }}" />
                                        </a>
                                    @endif
                                    <div class=" flex items-start flex-col justify-center ml-2 ">
                                        {{ $timestamp->time_out != null ? date_format(date_create($timestamp->time_out), 'h:i:s a') : '--:--:--' }}
                                        <br /> <small class=" text-slate-400 ">
                                            {{ $timestamp->time_out != null ? $timestamp->time_out_comment : '' }}</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{ totalHour($timestamp->time_in, $timestamp->time_out, $timestamp->break_in, $timestamp->break_out) }}
                            </td>

                            <td>
                                <form method="POST" action="{{ route('admintimestampDelete', $timestamp->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="underline cursor-pointer " value="Delete" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Break In</th>
                        <th>Break Out</th>
                        <th>Time Out</th>
                        <th>Total Hour</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        text: '➕timestamp',
                        action: function() {
                            window.location.href = "/admin/admintimestamp/create";
                        }
                    },
                    'copyHtml5',
                    {
                        extend: 'pdfHtml5',
                        title: 'attendance_report'
                    },

                ],
                initComplete: function() {
                    var btns = $('.dt-button');
                    var btnsCon = $('.dt-buttons');
                    btns.removeClass('dt-button');
                    console.log(btns.text())
                    btns.addClass(
                        ' w-fit p-2 bg-gradient-to-t from-slate-800 hover:to-slate-800 hover:scale-110 hover:-translate-y-1 active:scale-100 active:translate-y-0 transition-all'
                    );
                    btnsCon.addClass(' w-full flex gap-2')
                    $('#example_filter').addClass('absolute right-0 top-0');
                }
            });

        });
    </script>
@endsection
