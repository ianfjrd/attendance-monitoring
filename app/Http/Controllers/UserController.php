<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Timestamp;
use App\Models\User;
use App\Models\Department;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('checkRole:Admin')->only('create');
        $this->middleware('checkRole:Admin')->only('index');
        $this->middleware('checkRole:Admin')->only('store');

        $this->middleware('auth')->only('userDashboard');
        $this->middleware('checkRole:Admin')->only('show');
        $this->middleware('checkRole:Admin')->only('edit');
        $this->middleware('checkRole:Admin')->only('update');
        $this->middleware('checkRole:Admin')->only('updaterole');
        $this->middleware('checkRole:Admin')->only('destroy');
        $this->middleware('checkRole:Admin')->only('usersDeleted');
        $this->middleware('checkRole:Admin')->only('userRestore');
    }
    public function index(Request $request)
    {
        //
        $users = User::select('users.id', 'users.name', 'email', 'email_verified_at', 'password', 'current_team_id', 'profile_photo_path', 'age', 'departments.name AS department', 'phone_number', 'address', 'valid_id_number', 'role', 'workdays', 'time_in_user', 'break_duration', 'time_out_user', 'users.created_at')
            ->join('departments', 'departments.id', '=', 'users.department_id')->where('users.id', '!=', Auth::user()->id)->get();
        // $users = User::all();
        // dd($users);
        return view('admin.employee.admin-employeeList', ['users' => $users])->with('status', $request->session()->get('status'));
    }


    // Route for user's Dashboard or Home (Get user attendace history)
    public function userDashboard(Request $request, $sort = 'all', $filter = '')
    {
        if(Auth::user()->role->name == "Admin"){
            return redirect()->route('admindashboard');
        }

        // dd($filter);
        if ($sort == 'time_in_out') {
            $attendanceHistory = Timestamp::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc');
        } elseif ($sort == 'break_in_out') {
            $attendanceHistory = Timestamp::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc');
        } else {
            $attendanceHistory = Timestamp::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc');
        }

       
        if ($filter != '') {
            $filterExploded = explode("_", $filter);
            $filter = $filterExploded[0];
            $startDateFormat = date_create_from_format('m-d-Y', $filterExploded[1]);
            $startDate = date_format($startDateFormat, 'Y-m-d 00:00:00');
            $endDateFormat = date_create_from_format('m-d-Y', $filterExploded[2]);
            $endDate = date_format($endDateFormat, 'Y-m-d 23:59:00');
            $attendanceHistory->whereBetween('created_at', [$startDate, $endDate]);
        }




        $dayStart = date('Y/m/d') . ' 00:00:01';
        $dayEnd = date('Y/m/d') . ' 23:59:00';
        $user_timestamp = Timestamp::where('created_at', '>', $dayStart)->where('created_at', '<', $dayEnd)->first();

        $firstItem = $attendanceHistory->get()->reverse()->first();
        if ($firstItem != null) {
            $firstDate = date_format(date_create($firstItem->created_at), 'M d, Y');
        } else {
            $firstDate = "--/--/--";
        }

        $lasttItem = $attendanceHistory->get()->first();

        if ($lasttItem != null) {
            $lastDate = date_format(date_create($lasttItem->created_at), 'M d, Y');
        } else {
            $lastDate = "--/--/--";
        }

        return view('dashboard.home', [
            'filter' => $filter,
            'attendanceHistory' => $attendanceHistory->get(), 'sort' => $sort,
            'status' => Auth::user()->status(),
            'action' => TimestampController::OUTPUT_TIMESTAMP_COLUMNS[Auth::user()->nextTimestampColumn()],
            'user_timestamp' => $user_timestamp,
            'firstDate' => $firstDate,
            'lastDate' => $lastDate
        ])->with('status', $request->session()->get('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Redirect to display for adding new user or profile
        $departments = Department::all();
        return view('admin.employee.admin-addUser', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Store User (*admin can only access) 
    public function store(StoreUserRequest $request)
    {
        // dd($request);
        $validated = $request->validated();

        $user = new User();
        // Required Fields (name, email, and password)
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->age = $validated['age'];
        $user->department_id = $validated['department_id'];
        $user->phone_number = $validated['phone_number'];
        $user->address = $validated['address'];
        // $user->valid_id_number = $validated['valid_id_number'];
        $user->role = $validated['role'];
        $user->password = Hash::make($validated['password']);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->workdays = serialize($validated['workdays']);
        $user->time_in_user = $validated['time_in_user'];
        $user->break_duration = $validated['break_duration'];
        $user->time_out_user = $validated['time_out_user'];
       

        // Optional Fields (profile_photo_path)

        if (isset($validated['image'])) {
            $image = $validated['image']->store('public/profile');
            $imageName = explode('/', $image)[2];
            $user->profile_photo_path = $imageName;
        }

        $user->save();
        $status = "New user added successfully";
        return redirect()->route('employeelist')->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::select('users.id', 'users.name', 'email', 'email_verified_at', 'password', 'current_team_id', 'profile_photo_path', 'age', 'departments.name AS department', 'phone_number', 'address', 'valid_id_number', 'role', 'workdays', 'time_in_user', 'break_duration', 'time_out_user', 'users.created_at')
            ->join('departments', 'departments.id', '=', 'users.department_id')->where('users.id', '=', $id)->first();
        return view('admin.employee.admin-showUser', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Redirect to display for adding new user or profile 

        $user = User::where('id', '=', $id)->first();
        $departments = Department::all();

        return view('admin.employee.admin-editUser', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Update User (*admin and user can access) 
    public function update(UpdateUserRequest $request, $id)
    {
        // dd($request);
        $validated = $request->validated();
        $user = User::where('id', '=', $id)->first();

        // Required Fields (name, email, and password)
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->age = $validated['age'];
        $user->department_id = $validated['department_id'];
        $user->phone_number = $validated['phone_number'];
        $user->address = $validated['address'];
        // $user->valid_id_number = $validated['valid_id_number'];
        $user->role = $validated['role'];
        $user->workdays = serialize($validated['workdays']);
        $user->time_in_user = $validated['time_in_user'];
        $user->break_duration = $validated['break_duration'];
        $user->time_out_user = $validated['time_out_user'];

        if (isset($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Optional Fields (profile_photo_path)
        if (isset($validated['image'])) {
            File::delete(public_path() . '/storage/profile/' . $user->profile_photo_path);
            $image = $validated['image']->store('public/profile');
            $imageName = explode('/', $image)[2];
            $user->profile_photo_path = $imageName;
        }

        // To add:
        // workdays
        // time_in_user
        // break_duration
        // time_out_user

        $user->save();
        $status = "User updated successfully";
        return redirect()->route('employeelist')->with('status', $status);
    }


    //Update User Role (*admin can only access) 
    public function updateRole(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();
        $user->role = $request->role;
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', '=', $id)->delete();
        $status = "User deleted successfully";
        return redirect()->route('employeelist')->with('status', $status);
    }

    public function usersDeleted(Request $request)
    {
        $users = User::withTrashed()->where('deleted_at', '!=', null)->get();
        return view('admin.employee.admin-employeeDeleted', ['users' => $users])->with('status', $request->session()->get('status'));
    }

    public function userRestore($id)
    {
        $user = User::withTrashed()->where('id', '=', $id)->restore();
        $status = "User restored successfully";
        return redirect()->route('employeeDeleted')->with('status', $status);
    }
}
