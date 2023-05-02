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
    <div class=" relative pt-4 ">
        <form>
            <div class=" mx-auto  flex justify-center flex-col items-center max-w-md md:max-w-5xl gap-5 ">
                <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
                    ANNOUNCEMENT LIST (Admin)
                </div>
                {{-- <x-attendance-card/> --}}

                <table id="example" class="table is-striped text-white " style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcements as $announcement)
                            <tr>
                                <td>{{ $announcement->title }}</td>
                                <td>{{ $announcement->description }}</td>
                                <td>
                                    <a href="{{ route('announcement.edit', $announcement->id) }}"
                                        class="underline">Update</a>
                                    
                                    <form action="{{ route('announcement.destroy', $announcement->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="underline" type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
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
                        text: '➕announcement',
                        action: function() {
                            window.location.href = "{{ route('announcement.create') }}";
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
