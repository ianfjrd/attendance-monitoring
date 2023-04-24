<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeStampFormRequest;
use App\Models\Timestamp;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facades\Debugbar;

class TimestampController extends Controller
{

    public const OUTPUT_TIMESTAMP_COLUMNS = [
        'time_in' => 'Time In',
        'time_out' => 'Time Out',
        'break_in' => 'Break In',
        'break_out' => 'Break Out'
    ];
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
        $dayStart = date('Y/m/d') . ' 00:00:01';
        $dayEnd = date('Y/m/d') . ' 23:59:00';
        $user_timestamp = Timestamp::where('created_at', '>', $dayStart)->where('created_at', '<', $dayEnd)->first();
        //    dd($user_timestamp);
        // $timestamp_count = count( $user_timestamp->all());

        return view('timestamp.create', [
            'status' => Auth::user()->status(),
            'action' => TimestampController::OUTPUT_TIMESTAMP_COLUMNS[Auth::user()->nextTimestampColumn()],
            'user_timestamp' => $user_timestamp
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
        $nextColumn = Auth::user()->nextTimestampColumn();
        $timestamp = Timestamp::findByTimeInToday(Auth::id());


        if ($timestamp && $timestamp->$nextColumn == null) {
            $timestamp->update([$nextColumn => now()]);
        } else {
            $timestamp = Timestamp::create([
                Auth::user()->nextTimestampColumn() => now(),
                'user_id' => 1,
            ]);
        }

        $status = "";
        if($nextColumn == "time_in"){
            $status = "Time in has been recorded successfully.";
        }elseif($nextColumn == "break_in"){
            $status = "Break time has been recorded successfully.";
        }elseif($nextColumn == "break_out"){
            $status = "The end of break time has been recorded successfully.";
        }elseif($nextColumn == "time_out"){
            $status = "Time out has been recorded successfully.";
        }

        return redirect(route('dashboard'));
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
