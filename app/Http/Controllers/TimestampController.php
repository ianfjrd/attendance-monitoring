<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeStampFormRequest;
use App\Models\Timestamp;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facades\Debugbar;

class TimestampController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $dayStart = date('Y/m/d').' 00:00:01';
        $dayEnd = date('Y/m/d').' 23:59:00';
        $user_timestamp = Timestamp::where('created_at', '>', $dayStart)->where('created_at', '<', $dayEnd)->get();  
        $timestamp_count = count( $user_timestamp->all());

        return view('timestamp.create', [
            'status' => Auth::user()->status(),
            'timestamp_name' => Auth::user()->nextTimestampName(),
            'timestamp_count' => $timestamp_count 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Auth::user()->nextTimestampName();

        $timestamp = Timestamp::create([
            'name' => Auth::user()->nextTimestampName(),
            'user_id' => Auth::id(),
        ]);

        return redirect(route('timestamp.create'));

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
