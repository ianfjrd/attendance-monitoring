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

        <div class=" mx-auto  flex justify-center flex-col items-center max-w-md md:max-w-5xl gap-5 ">
            <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
                LEAVES LIST
            </div>
            {{-- <x-attendance-card/> --}}

            <table id="example" class="table is-striped text-white " style="width:100%">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Type</th>
                        <th>Reason</th>
                        <th>Confirmation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaves as $leave)
                        <tr>
                            <td>{{ $leave->status }}</td>
                            <td>{{ $leave->date_start }}</td>
                            <td>{{ $leave->date_end }}</td>
                            <td>{{ $leave->type }}</td>
                            <td>{{ $leave->reason }}</td>
                            <td>{{ $leave->leaves_status }}</td>
                            <td>
                                <a href="{{ route('leaves.show', $leave->id) }}" class="underline">Show</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Status</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Type</th>
                        <th>Reason</th>
                        <th>Confirmation</th>
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
                buttons: [
                    'copyHtml5',
                    {
                        extend: 'pdfHtml5',
                        title: 'leaves_report'
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
