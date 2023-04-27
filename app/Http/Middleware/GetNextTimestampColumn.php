<?php

namespace App\Http\Middleware;

use App\Http\Controllers\TimestampController;
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
            $user_timestamp = Timestamp::where('created_at', '>', $dayStart)->where('created_at', '<', $dayEnd)->first();

            if ($user_timestamp&&$user_timestamp->time_out != null){
                session(['nextTimestamp' => "Work Done"]);
            }else{
                $nextTimeStampColumn = TimestampController::OUTPUT_TIMESTAMP_COLUMNS[Auth::user()->nextTimestampColumn()];
                session(['nextTimestamp' => $nextTimeStampColumn]);
            }

            
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
