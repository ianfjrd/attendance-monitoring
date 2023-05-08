<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\LeaveTypes;

class LeaveTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $leavetypes = LeaveTypes::all();
        
        return view('admin.leavetypes.admin-leavetypes', compact('leavetypes'))->with('status', $request->session()->get('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leavetypes.leavetypes-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $leavetype = new LeaveTypes();
        $leavetype->name = $input['name'];
        $leavetype->save();
        
        return Redirect::to('admin/leavetypes')->with('status', 'LeaveTypes recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $leavetype = LeaveTypes::where('id', '=', $id)->first();
        
        return view('admin.leavetypes.leavetypes-show', compact('leavetype'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $leavetype = LeaveTypes::where('id', '=', $id)->first();
        
        return view('admin.leavetypes.leavetypes-update', compact('leavetype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $leavetype = LeaveTypes::where('id', '=', $id)->first();
        $leavetype->name = $request->name;
        $leavetype->save();
        
        return Redirect::to('admin/leavetypes')->with('status', 'LeaveTypes updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leavetype = LeaveTypes::where('id', '=', $id)->delete();
        
        return Redirect::to('admin/leavetypes')->with('LeaveTypes deleted successfully!');
    }
}
