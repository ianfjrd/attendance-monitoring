<x-app-layout>

    {{-- <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
           <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
     </button> --}}

     <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <a class="flex items-center pl-2.5 mb-5 mt-1">
               <img src="{{asset('images/logo.png')}}" class="h-6 mr-3 sm:h-7" alt="Marvill Logo" />
            </a>
            <a class="flex items-center px-5 py-5">
                <img src="{{asset('images/adminlogo.png')}}" class="w-full" alt="Marvill Admin Logo" />
             </a>
           <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route('admindashboard')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                   <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                   <span class="ml-3">Dashboard</span>
                </a>
             </li>
            <li>
                <a href="{{route('forgottotimeout')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                   <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                     </svg>
                   <span class="flex-1 ml-3 whitespace-nowrap">Forgot to Time Out</span>
                </a>
             </li>
              <li>

                 <a href="{{route('reqovertime')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>

                    <span class="flex-1 ml-3 whitespace-nowrap">Request Overtime</span>
                    {{-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> --}}
                 </a>
              </li>
              {{-- <li>
                 <a href="{{route('timeOut')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg fill="none" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                      </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Time-out</span>
                    {{-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> --}}
                 </a>
              </li>
             <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                      </svg>
                      <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Employees</span>
                      <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('employeelist')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-8 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                       <span class="flex-1 ml-3 whitespace-nowrap">Employee List</span></a>
                     </li>
                     <li>
                        <a href="{{route('addnewuser')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-8 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                       <span class="flex-1 ml-3 whitespace-nowrap">Add New Employee</span></a>
                     </li>
                      <li>
                         <a href="{{route('employeeleaves')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-8 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Employee Leaves</span></a>
                      </li>
                      <li>
                        <a href="{{route('employeeDep')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-8 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Employee Department</span></a>
                     </li>
                     <li>
                        <a href="{{route('employeeDeleted')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-8 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                       <span class="flex-1 ml-3 whitespace-nowrap">Employee Deleted List</span></a>
                     </li>
                </ul>
             </li>
             <li>
                <a href="{{route('admintimestamp')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9v6m-4.5 0V9M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                   <span class="flex-1 ml-3 whitespace-nowrap">Timestamp</span>
                </a>
             </li>

           </ul>
        </div>
     </aside>

     <div class="p-4 sm:ml-64 my-auto relative  ">
        <div class="p-4  dark:text-white ">
            {{-- <x-welcome /> --}}
            @yield('content')
        </div>
     </div>



    </x-app-layout>
