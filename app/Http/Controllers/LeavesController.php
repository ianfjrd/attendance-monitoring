<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Leaves;
use App\Models\LeaveTypes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LeavesController extends Controller
{


    public function __construct()
    {
        $this->middleware('checkRole:User')->only('userIndex');
        $this->middleware('checkRole:User')->only('userCreate');
        $this->middleware('checkRole:User')->only('userShow');
        $this->middleware('checkRole:Admin')->only('index');
        $this->middleware('checkRole:Admin')->only('create');
        $this->middleware('auth')->only('store');
        $this->middleware('checkRole:Admin')->only('show');
        $this->middleware('checkRole:Admin')->only('edit');
        $this->middleware('checkRole:Admin')->only('update');
        $this->middleware('checkRole:Admin')->only('destroy');
    }


    function status($date_start, $date_end)
    {
        if (date("m/d/Y", strtotime(($date_start))) > date("m/d/Y")) {
            $status = 'Upcoming';
        }
        elseif (date("m/d/Y", strtotime(($date_start))) <= date("m/d/Y") && date("m/d/Y", strtotime(($date_end))) > date("m/d/Y")) {
            $status = 'Ongoing';
        } 
        else {
            $status = 'Done';
        }

        return $status;
    }

    function leavesStatus($role)
    {
        if ($role == 'Admin') {
            $leaves_status = 'Approved';
        }
        else {
            $leaves_status = 'Pending';
        }

        return $leaves_status;
    }

    function updateStatus()
    {
        $upcoming = Leaves::where('date_start', '>', date("m/d/Y"))
            ->update(["status" => "Upcoming"]);

        $ongoing = Leaves::where('date_start', '<=', date("m/d/Y"))
            ->where('date_end', '>', date("m/d/Y"))
            ->update(["status" => "Ongoing"]);

        $done = Leaves::where('date_end', '<', date("m/d/Y"))
            ->update(["status" => "Done"]);

        return [$upcoming, $ongoing, $done];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->updateStatus();

        $leaves = Leaves::select('leaves.id', 'users.name', 'date_start', 'date_end', 'leaves_status', 'status', 'leave_types.name AS type', 'reason')
            ->join('users', 'users.id', '=', 'leaves.user_id')
            ->join('leave_types', 'leave_types.id', '=', 'leaves.leave_types_id')
            ->get();
            return view('admin.leaves.admin-leaves', compact('leaves'))->with('status', $request->session()->get('status'));
    }

    public function userIndex(Request $request) {
        $this->updateStatus();
        
        $leaves = Leaves::select('leaves.id', 'date_start', 'date_end', 'leaves_status', 'status', 'leave_types.name AS type', 'reason')
            ->join('leave_types', 'leave_types.id', '=', 'leaves.leave_types_id')
            ->where('user_id', '=', Auth::user()->id)->get();
        
        return view('timestamp.leaves.dashboard-leaves', compact('leaves'))->with('status', $request->session()->get('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->updateStatus();
        $users = User::select('id', 'name')->orderBy('name', 'ASC')->get();
        $leavetypes = LeaveTypes::select('id', 'name')->orderBy('name', 'ASC')->get();
        
        return view('admin.leaves.leaves-create', compact('users', 'leavetypes'));
    }

    public function userCreate()
    {
        $this->updateStatus();
        $leavetypes = LeaveTypes::select('id', 'name')->orderBy('name', 'ASC')->get();
        
        return view('timestamp.leaves.leaves-create', compact('leavetypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $leave = new Leaves();
        $leave->date_start = $input['date_start'];
        $leave->date_end = $input['date_end'];
        $leave->leave_types_id = $input['leave_types_id'];
        $leave->reason = $input['reason'];
        $leave->user_id = 1;
        if(Auth::user()->role->name == 'Admin') {
            $leave->user_id = $input['user_id'];
        }
        else {
            $leave->user_id = Auth::user()->id;
        }
        $leave->leaves_status = $this->leavesStatus(Auth::user()->role->name);
        $leave->status = $this->status($input['date_start'], $input['date_end']);
        $leave->save();

        if(Auth::user()->role->name == 'Admin') {
            return Redirect::to('admin/leaves')->with('status', 'Employee leave request recorded successfully!');
        }
        else {
            return Redirect::to('dashboard/leaves/index')->with('status', 'Leave request recorded successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->updateStatus();
        $leave = Leaves::select('leaves.id', 'users.name', 'date_start', 'date_end', 'leaves_status', 'status', 'leave_types.name AS type', 'reason')
            ->join('leave_types', 'leave_types.id', '=', 'leaves.leave_types_id')
            ->join('users', 'users.id', '=', 'leaves.user_id')
            ->where('leaves.id', '=', $id)->first();

        return view('admin.leaves.leaves-show', compact('leave'));
    }

    public function userShow(string $id)
    {
        $this->updateStatus();
        $leave = Leaves::select('leaves.id', 'users.name', 'date_start', 'date_end', 'leaves_status', 'status', 'leave_types.name AS type', 'reason')
            ->join('leave_types', 'leave_types.id', '=', 'leaves.leave_types_id')
            ->join('users', 'users.id', '=', 'leaves.user_id')
            ->where('leaves.id', '=', $id)->first();

        return view('timestamp.leaves.leaves-show', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->updateStatus();
        $leave = Leaves::where('id', '=', $id)->first();
        $leavetypes = LeaveTypes::select('id', 'name')->orderBy('name', 'ASC')->get();

        return view('admin.leaves.leaves-update', compact('leave', 'leavetypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $leave = Leaves::where('id', '=', $id)->first();
        $leave->date_start = $request->date_start;
        $leave->date_end = $request->date_end;
        $leave->leave_types_id = $request->leave_types_id;
        $leave->reason = $request->reason;
        $leave->leaves_status = $request->leaves_status;
        $leave->status = $this->status($request->date_start, $request->date_end);
        $leave->save();

        return Redirect::to('admin/leaves')->with('status', 'Employee leave request updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $leave = Leaves::where('id', '=', $id)->delete();

        return Redirect::to('admin/leaves')->with('status', 'Employee leave request deleted successfully!');
    }
}
