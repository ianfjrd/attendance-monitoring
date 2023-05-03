<?php

namespace App\Http\Controllers;

use App\Models\Leaves;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function index()
    {

        $totalEmployee = User::all()->count();
        $total_request_leave = Leaves::select('*')->count();
        $total_employee_leave = Leaves::select('*')->where('leaves_status', '=', 'Approved')->where('status', '=', 'Ongoing')->count();
        // dd($totalEmployee);



        return view('admin.admindash-content', ['totalEmployee' => $totalEmployee, 'total_request_leave' => $total_request_leave, 'total_employee_leave' => $total_employee_leave]);
    }
}
