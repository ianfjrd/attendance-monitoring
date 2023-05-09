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
                DEPARTMENT LIST (Admin)
            </div>
            {{-- <x-attendance-card/> --}}

            <table id="example" class="table is-striped text-white " style="width:70vw">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->name }}</td>
                            <td>
                                <button data-modal-target="{{ $department->name }}"
                                    data-modal-toggle="{{ $department->name }}" class="underline">Show</button>
                                <a href="{{ route('department.edit', $department->id) }}" class="underline">Update</a>
                                <form action="{{ route('department.destroy', $department->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="underline" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Show Modal --}}
                        <div class="p-4 sm:ml-64 my-auto absolute  ">
                            <div class="p-4 text-white ">

                                <div id="{{ $department->name }}" tabindex="-1" aria-hidden="true"
                                    class=" fixed left-0 right-0 z-50 hidden  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full  ">

                                        <div class="relative rounded-lg shadow bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white"
                                                data-modal-hide="{{ $department->name }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">

                                                <div class=" relative ">
                                                    <form action={{ route('timestamp.store') }} method="POST">
                                                        @csrf
                                                        <div
                                                            class=" mx-auto  flex justify-center flex-col items-center max-w-md gap-8 ">
                                                            <div
                                                                class=" w-full text-center text-3xl text-[#8EC33F] font-[900] ">
                                                                Department
                                                            </div>

                                                            <div class=" flex justify-center  w-full flex-col ">
                                                                <div class="relative flex items-start mb-10 justify-center">
                                                                    <div
                                                                        class="text-sm md:text-5xl text-white w-[350px] justify-center text-center">
                                                                        <h4 class="font-semibold text-2xl leading-loose">
                                                                            {{ $department->name }}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @yield('content')
                            </div>
                        </div>

                        {{-- Show Script --}}
                        <script type="text/javascript">
                            // set the modal menu element
                            const $targetEl = document.getElementById('{{ $department->name }}');

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
                        </script>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
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
                        text: '➕Department',
                        action: function() {
                            window.location.href = "{{ route('department.create') }}";
                        }
                    },
                    // 'copyHtml5',
                    // {
                    //     extend: 'pdfHtml5',
                    //     title: 'leaves_report'
                    // },

                ],
                initComplete: function() {
                    var btns = $('.dt-button');
                    var btnsCon = $('.dt-buttons');
                    btns.removeClass('dt-button');
                    console.log(btns.text())
                    btns.addClass(
                        '  w-fit p-2 bg-gradient-to-t from-slate-800 hover:to-slate-800 hover:scale-110 hover:-translate-y-1 active:scale-100 active:translate-y-0 transition-all'
                    );
                    btnsCon.addClass(' w-full flex gap-2')
                    $('#example_filter').addClass('absolute right-0 top-0');
                }
            });

        });
    </script>
@endsection
