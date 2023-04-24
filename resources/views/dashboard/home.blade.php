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


@section('content')
    <div class=" relative pt-4 ">
        <form>
            <div class=" mx-auto  flex justify-center flex-col items-center max-w-md md:max-w-5xl gap-5 ">
                <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
                    ATTENDANCE HISTORY
                </div>
                {{-- <x-attendance-card/> --}}
                <table id="example" class="table is-striped text-white " style="width:100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            @if ($sort == 'all' || $sort == 'time_in')
                                <th>Time In</th>
                            @endif
                            @if ($sort == 'all' || $sort == 'break_in')
                                <th>Break In</th>
                            @endif
                            @if ($sort == 'all' || $sort == 'break_out')
                                <th>Break Out</th>
                            @endif
                            @if ($sort == 'all' || $sort == 'time_out')
                                <th>Time Out</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($attendanceHistory as $attendance)
                            <tr>
                                <td>{{ date_format(date_create($attendance->created_at), 'M d, Y') }}</td>

                                @if ($sort == 'all' || $sort == 'time_in')
                                    <td>{{ $attendance->time_in != null ? date_format(date_create($attendance->time_in), 'H:i:s a') : '--:--:--' }}
                                    </td>
                                @endif
                                @if ($sort == 'all' || $sort == 'break_in')
                                    <td>{{ $attendance->break_in != null ? date_format(date_create($attendance->break_in), 'H:i:s a') : '--:--:--' }}
                                    </td>
                                @endif
                                @if ($sort == 'all' || $sort == 'break_out')
                                    <td>{{ $attendance->break_out != null ? date_format(date_create($attendance->break_out), 'H:i:s a') : '--:--:--' }}
                                    </td>
                                @endif
                                @if ($sort == 'all' || $sort == 'time_out')
                                    <td>{{ $attendance->time_out != null ? date_format(date_create($attendance->time_out), 'H:i:s a') : '--:--:--' }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            @if ($sort == 'all' || $sort == 'time_in')
                                <th>Time In</th>
                            @endif
                            @if ($sort == 'all' || $sort == 'break_in')
                                <th>Break In</th>
                            @endif
                            @if ($sort == 'all' || $sort == 'break_out')
                                <th>Break Out</th>
                            @endif
                            @if ($sort == 'all' || $sort == 'time_out')
                                <th>Time Out</th>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>

    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        text: 'All',
                        action: function() {
                            window.location.href = "/dashboard/history/all";
                        }
                    },
                    {
                        text: 'Time In',
                        action: function() {
                            window.location.href = "/dashboard/history/time_in";
                        }
                    },
                    {
                        text: 'Break In',
                        action: function() {
                            window.location.href = "/dashboard/history/break_in";
                        }
                    },
                    {
                        text: 'Break Out',
                        action: function() {
                            window.location.href = "/dashboard/history/break_out";
                        }
                    },
                    {
                        text: 'Time Out',
                        action: function() {
                            window.location.href = "/dashboard/history/time_out";
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
                        ' grow w-24 p-2 bg-gradient-to-t from-slate-800 hover:to-slate-800 hover:scale-110 hover:-translate-y-1 active:scale-100 active:translate-y-0 transition-all'
                    );
                    btnsCon.addClass(' w-full flex gap-2')
                    $('#example_filter').addClass('hidden');
                }
            });

        });
    </script>
@endsection
