<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Leaves;
use Illuminate\Support\Facades\Auth;

class LeavesController extends Controller
{
    function status($date_start, $date_end)
    {
        if(date("m/d/Y", strtotime(($date_start))) > date("m/d/Y")) {
            $status = 'Upcoming';
        }
        elseif(date("m/d/Y", strtotime(($date_start))) <= date("m/d/Y") && date("m/d/Y", strtotime(($date_end))) > date("m/d/Y")) {
            $status = 'Ongoing';
        }
        else {
            $status = 'Done';
        }

        return $status;
    }

    function leavesStatus($role)
    {
        if($role == 'Admin') {
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
    public function index()
    {
        $this->updateStatus();
        $leaves = Leaves::select('leaves.id', 'name', 'date_start', 'date_end', 'leaves_status', 'status', 'type', 'reason')
            ->join('users', 'users.id', '=', 'leaves.user_id')->get();
       
        return view('admin.leaves.admin-leaves', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->updateStatus();
        return view('admin.leaves.leaves-create');
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
        $leave->type = $input['type'];
        $leave->reason = $input['reason'];
        $leave->user_id = 1;
        $leave->user_id = Auth::user()->id;
        $leave->leaves_status = $this->leavesStatus(Auth::user()->role);
        // $leave->leaves_status = 'Pending';
        $leave->status = $this->status($input['date_start'], $input['date_end']);
        $leave->save();

        // return $leave;
        return Redirect::to('admin/leaves')->with('success','New Announcement added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->updateStatus();
        $leave = Leaves::select('leaves.id', 'name', 'date_start', 'date_end', 'leaves_status', 'status', 'type', 'reason')
        ->join('users', 'users.id', '=', 'leaves.user_id')->where('leaves.id', '=', $id)->first();

        // return $leave;
        return view('admin.leaves.leaves-show', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->updateStatus();
        $leave = Leaves::where('id', '=', $id)->first();

        // return $leave;
        return view('admin.leaves.leaves-update', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $leave = Leaves::where('id', '=', $id)->first();
        $leave->date_start = $request->date_start;
        $leave->date_end = $request->date_end;
        $leave->type = $request->type;
        $leave->reason = $request->reason;
        // $leave->leaves_status = $this->leavesStatus(Auth::user()->role);
        $leave->leaves_status = $request->leaves_status;
        $leave->status = $this->status($request->date_start, $request->date_end);
        $leave->save();

        // return $leave;
        return Redirect::to('admin/leaves')->with('success','Leave updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $leave = Leaves::where('id', '=', $id)->delete();
        
        // return $leave;
        return Redirect::to('admin/leaves')->with('success','Leaves deleted!');
    }
}
