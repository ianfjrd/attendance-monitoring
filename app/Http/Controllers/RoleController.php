<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:Admin')->only('index');
        $this->middleware('checkRole:Admin')->only('createForAdmin');
        $this->middleware('checkRole:Admin')->only('storeForAdmin');
        $this->middleware('checkRole:Admin')->only('destroy');
    }

    public function index()
    {
        $roles = Role::all();

        return view('admin.role.index', [
            'roles' => $roles
        ])
            ->with('status', session()->get('status'));
    }

    public function create()
    {
        return view('admin.role.create')
            ->with('status', session()->get('status'));
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name
        ]);

        return redirect(route('role.index'))->with('status', 'Role created successfully');
    }

    public function show($id)
    {
        return view('admin.role.show', [
            'role' => Role::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.role.edit', [
            'role' => Role::find($id) 
        ]);
    }

    public function update(Request $request, $id)
    {
        Role::find($id)
            ->update([
                'name' => $request->name
            ]);
        return redirect(route('role.index'))->with('status', 'Role updated successfully');
    }

    public function destroy($id)
    {
        Role::where('id', '=', $id)->delete();
        $status = "Role deleted successfully";
        return redirect(route('role.index'))->with('status', $status);
    }
}
