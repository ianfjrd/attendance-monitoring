<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeStampFormRequest;
use App\Http\Requests\TimestampRequest;
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
        $this->middleware('checkRole:Admin')->only('index');
        $this->middleware('checkRole:Admin')->only('createForAdmin');
        $this->middleware('checkRole:Admin')->only('storeForAdmin');
        $this->middleware('checkRole:Admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $timestamps = Timestamp::with('user')->get();
        return view('admin.timestamp.admin-timestamp', ['timestamps' => $timestamps])->with('status', $request->session()->get('status'));
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

    public function createForAdmin()
    {
        $users = User::all()->pluck('name', 'id');
        return view('admin.timestamp.timestamp-create', ['users' => $users]);
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
        $timeNow =  now();
        if ($request->image) {

            $imageFile = $request->image->store('public/images/timestamp');
            $imageName = explode('/', $imageFile)[3];
        }
        if ($timestamp && $timestamp->$nextColumn == null) {

            if ($nextColumn == "time_out") {
                $timestamp->update([
                    $nextColumn => $timeNow,
                    'time_out_comment' => $this->timeCompare(Auth::user()->time_out_user, $timeNow),
                    'time_out_image' => $imageName,
                ]);
            } elseif ($nextColumn == "break_out") {

                $timestamp->update([
                    $nextColumn => $timeNow,
                    'break_time_comment' => $this->timeCompareDuration(Auth::user()->break_duration, $timestamp->break_in, $timeNow)
                ]);
            } else {

                $timestamp->update([
                    $nextColumn => $timeNow
                ]);
            }
        } else {

            $timestamp = Timestamp::create([
                Auth::user()->nextTimestampColumn() => $timeNow,
                'time_in_comment' => $this->timeCompare(Auth::user()->time_in_user, $timeNow),
                'time_in_image' => $imageName,
                'user_id' => Auth::user()->id,
            ]);
        }



        $status = "";
        if ($nextColumn == "time_in") {
            $status = "Time in has been recorded successfully.";
        } elseif ($nextColumn == "break_in") {
            $status = "Break time has been recorded successfully.";
        } elseif ($nextColumn == "break_out") {
            $status = "The end of break time has been recorded successfully.";
        } elseif ($nextColumn == "time_out") {
            $status = "Time out has been recorded successfully.";
        }



        return redirect(route('dashboard'))->with('status', $status);
    }


    public function storeForAdmin(TimestampRequest $request)
    {


        $validated = $request->validated();
        if ($request->image) {
            $imageFile = $request->image->store('public/images/timestamp');
            $imageName = explode('/', $imageFile)[3];
        }

        if ($request->image1) {
            $imageFile1 = $request->image->store('public/images/timestamp');
            $imageName1 = explode('/', $imageFile1)[3];
        }


        $timestamp = new Timestamp();
        $timestamp->time_in = $validated['time_in'];
        $timestamp->time_in_comment = $this->timeCompare(Auth::user()->time_in_user, $validated['time_in']);
        $timestamp->time_in_image = $imageName;

        $timestamp->time_out = $validated['time_out'];
        $timestamp->time_out_comment = $this->timeCompare(Auth::user()->time_out_user, $validated['time_out']);
        $timestamp->time_out_image = $imageName;

        $timestamp->break_in = $validated['break_in'];
        $timestamp->break_out = $validated['break_out'];
        $timestamp->break_time_comment    = $this->timeCompareDuration(Auth::user()->break_duration, $validated['break_in'],  $validated['break_out']);
        $timestamp->user_id = $validated['user_id'];


        $timestamp->save();
        $status = "New timestamp added successfully";
        return redirect(route('admintimestamp'))->with('status', $status);
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
        Timestamp::where('id', '=', $id)->delete();
        $status = "Timestamp deleted successfully";
        return redirect(route('admintimestamp'))->with('status', $status);
    }

    private function timeCompare($timePolicy, $timestamp)
    {
        $time1 = $timePolicy;
        $time2 = $timestamp;


        $timestamp1 = strtotime($time1);
        $timestamp2 = strtotime($time2);


        $diff = $timestamp2 - $timestamp1;


        $diff_minutes = abs(round($diff / 60));



        if ($diff_minutes < 60) {
            $timeValue = " $diff_minutes minutes";
        } else {
            $diff_hours = round($diff_minutes / 60);
            $timeValue = " $diff_hours hours";
        }


        if ($timestamp1 < $timestamp2) {
            return "$timeValue late";
        } else if ($timestamp1 > $timestamp2) {
            return "$timeValue early";
        } else {
            return "You are on time";
        }
    }


    private function timeCompareDuration($durationPolicy, $timeStart, $timeEnd)
    {

        $date_obj1 = new DateTime($timeStart);
        $hourMinute1 = $date_obj1->format('H:i');

        $date_obj2 = new DateTime($timeEnd);
        $hourMinute2 = $date_obj2->format('H:i');


        $time1 = $hourMinute1;
        $time2 = $hourMinute2;


        $timestamp1 = strtotime($time1);
        $timestamp2 = strtotime($time2);


        $diff = $timestamp2 - $timestamp1;


        $diff_minutes = intval(abs(round($diff / 60)));

        $exceed = $durationPolicy - $diff_minutes;
        // dd($exceed);
        if ($exceed < 1) {

            return "Your break time has exceeded " . abs($exceed) . " minutes.";
        } else {

            return "Your breaktime takes " . abs($diff_minutes) . " minutes only";
        }
    }
}
