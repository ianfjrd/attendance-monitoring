<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Timestamp;
use App\Models\User;
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
    public function index()
    {
        //
        $users = User::all();

        return $users;
    }


    // Route for user's Dashboard or Home (Get user attendace history)
    public function userDashboard($sort = 'all')
    {


        if ($sort == 'time_in') {
            $attendanceHistory = Timestamp::where('user_id', '=', Auth::user()->id)->select(['created_at', 'time_in'])->get();
        } elseif ($sort == 'break_in') {
            $attendanceHistory = Timestamp::where('user_id', '=', Auth::user()->id)->select(['created_at', 'break_in'])->get();
        } elseif ($sort == 'break_out') {
            $attendanceHistory = Timestamp::where('user_id', '=', Auth::user()->id)->select(['created_at', 'break_out'])->get();
        } else {
            $attendanceHistory = Timestamp::where('user_id', '=', Auth::user()->id)->get();
        }


        return view('dashboard.home', ['attendanceHistory' => $attendanceHistory, 'sort' => $sort]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirect to display for adding new user or profile 
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
        $validated = $request->validated();

        $user = new User();
        // Required Fields (name, email, and password)
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->age = $validated['age'];
        $user->department = $validated['department'];
        $user->phone_number = $validated['phone_number'];
        $user->address = $validated['address'];
        $user->valid_id_number = $validated['valid_id_number'];
        $user->role = $validated['role'];
        $user->password = Hash::make($validated['password']);

        // Optional Fields (profile_photo_path)

        if (isset($validated['image'])) {
            $image = $validated['image']->store('public/profile');
            $imageName = explode('/', $image)[2];
            $user->profile_photo_path = $imageName;
        }

        $user->save();
        return ($user);
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
        $user = User::where('id', '=', $id)->with('timestamp')->get();
        return $user;
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
        $validated = $request->validated();
        $user = User::where('id', '=', $id)->first();

        // Required Fields (name, email, and password)
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->age = $validated['age'];
        $user->department = $validated['department'];
        $user->phone_number = $validated['phone_number'];
        $user->address = $validated['address'];
        $user->valid_id_number = $validated['valid_id_number'];
        $user->role = $validated['role'];
        $user->password = Hash::make($validated['password']);

        // Optional Fields (profile_photo_path)
        if (isset($validated['image'])) {
            File::delete(public_path() . '/storage/profile/' . $user->profile_photo_path);
            $image = $validated['image']->store('public/profile');
            $imageName = explode('/', $image)[2];
            $user->profile_photo_path = $imageName;
        }

        $user->save();
        return $user;
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
        return 'deleted successfully';
    }

    public function usersDeleted()
    {
        $users = User::withTrashed()->where('deleted_at', '!=', null)->get();
        return $users;
    }

    public function userRestore($id)
    {
        $user = User::withTrashed()->where('id', '=', $id)->restore();
        return "restore successfully";
    }
}
