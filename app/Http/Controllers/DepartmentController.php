<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departments = Department::all();
        
        return view('admin.department.admin-department', compact('departments'))->with('status', $request->session()->get('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.department-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $department = new Department();
        $department->name = $input['name'];
        $department->save();
        
        return Redirect::to('admin/department')->with('status', 'Department recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::where('id', '=', $id)->first();
        
        return view('admin.department.department-show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::where('id', '=', $id)->first();
        
        return view('admin.department.department-update', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = Department::where('id', '=', $id)->first();
        $department->name = $request->name;
        $department->save();
        
        return Redirect::to('admin/department')->with('status', 'Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::where('id', '=', $id)->delete();
        
        return Redirect::to('admin/department')->with('Department deleted successfully!');
    }
}
