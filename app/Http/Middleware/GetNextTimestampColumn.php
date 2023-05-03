<?php

namespace App\Http\Middleware;

use App\Http\Controllers\TimestampController;
use App\Models\Leaves;
use App\Models\Timestamp;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetNextTimestampColumn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()->id) {

            $dayStart = date('Y/m/d') . ' 00:00:01';
            $dayEnd = date('Y/m/d') . ' 23:59:00';
            $user_timestamp = Timestamp::where('created_at', '>', $dayStart)->where('created_at', '<', $dayEnd)->where('user_id', '=', Auth::user()->id)->first();

            $hasleaves = Leaves::where('id', '=', Auth::user()->id)
                ->where('leaves_status', '=', 'Approved')
                ->where('status', '=', 'Ongoing')
                ->first();


            $workingDays = unserialize(Auth::user()->workdays);

            date_default_timezone_set('Asia/Manila');
            $today_name = date('l');



            if ($hasleaves == null) {

                if (in_array($today_name,  $workingDays) == null || in_array($today_name,  $workingDays) == false) {

                    session(['nextTimestamp' => "No Work Today"]);
                } else {
                    // dd($user_timestamp->time_out);
                    if ($user_timestamp && $user_timestamp->time_out != null) {
                        session(['nextTimestamp' => "Work Done"]);
                    } else {
                        $nextTimeStampColumn = TimestampController::OUTPUT_TIMESTAMP_COLUMNS[Auth::user()->nextTimestampColumn()];
                        session(['nextTimestamp' => $nextTimeStampColumn]);
                    }
                }
            } else {
                session(['nextTimestamp' => "On Leave"]);
            }


            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
