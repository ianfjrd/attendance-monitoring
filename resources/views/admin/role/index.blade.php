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
    @include('roleListBase64')

    <div class=" relative pt-4 ">
        @if ($status != null)
            <div id="alert-3"
                class="flex p-4 mb-4 rounded-lg bg-gray-800 text-green-400"
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
                    class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700"
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



        <div class=" mx-auto  flex justify-center flex-col items-center max-w-md md:max-w-5xl gap-5 ">
            <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] mb-4 ">
                ROLE LIST (Admin)
            </div>
            {{-- <x-attendance-card/> --}}

            <table id="example" class="table is-striped table-auto text-white" style="width:70vw">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td class=" flex flex-col ">
                                <a href="{{route('role.show', $role->id)}}" class="underline">Show</a>
                                <a href="{{route('role.edit', $role->id)}}" class="underline">Update</a>
                                <form action="{{route('role.destroy', $role->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </table>
        </div>


    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                columns: [
                    {
                        data: 'id',
                        title: 'ID',
                    },
                    {
                        data: 'name',
                        title: 'Name',
                    },
                    
                    {
                        data: 'action',
                        title: 'Action'
                    }
                ],
                "order": [
                    [0, "desc"]
                ],
                dom: 'Bfrtip',
                buttons: [{
                        text: '➕ Add New',
                        action: function() {
                            window.location.href = "/admin/role/create"
                        }
                    },
                    'copyHtml5',
                    {
                        download: 'open',
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1]
                        },
                        text: 'Export To PDF',
                        orientation: 'landscape',
                        pageSize: 'A4',

                        customize: function(doc) {
                            console.log(doc.content);

                            doc.content.splice(0, 0, {
                                alignment: "center",
                                width: 500,
                                image: "{{ logo() }}",
                                margin: [0, 0, 0, 12]
                            });

                            doc.content.splice(1, 1, {
                                alignment: "center",
                                border: [true, true, true, true],
                                borderColor: '#000',
                                borderStyle: 'solid',
                                fontSize: 10,
                                margin: [15, 0, 0, 10],
                                text: " Name: <?php echo Auth::user()->name; ?> "
                            });

                            doc.content[2].table.widths = Array(doc.content[2].table.body[0]
                                .length + 1).join('*').split('');
                            doc.content[2].alignment = 'center';

                            doc.content[2].table.widths = [
                                '50%',
                                '50%'
                            ]
                        }
                    },
                ],
                initComplete: function(settings, json) {
                    var btns = $('.dt-button');
                    var btnsCon = $('.dt-buttons');
                    btns.removeClass('dt-button');
                    btns.addClass(
                        ' text-white w-fit p-2 bg-gradient-to-t from-slate-800 hover:to-slate-800 hover:scale-110 hover:-translate-y-1 active:scale-100 active:translate-y-0 transition-all'
                    );
                    btnsCon.addClass(' w-full flex gap-2 mb-4')
                    $('#example_filter').addClass('absolute right-0 top-0');
                }
            });
        });
    </script> 
@endsection
