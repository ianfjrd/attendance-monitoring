<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimestampRequest;
use App\Models\Timestamp;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimestampController extends Controller
{
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
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimestampRequest $request)
    {
        date_default_timezone_set('Asia/Manila');
        $dateTimeNow =  date('Y-m-d H:i:s', time());
        $dateNow =  date('Y-m-d');
        

        //change code below to Get id of authenticated user 
        $user_id = 1;
        // $user_id = Auth::user();

        

        $validated = $request->validated();

        $timestamp_user = DB::table('timestamp_user')->where('user_id', '=', $user_id)->where('date', '=', $dateNow)->get()->first();
        
       
        if ($timestamp_user) {
           
            $timestamp = Timestamp::where('id', '=', $timestamp_user->timestamp_id)->first();
          
            if ($timestamp->breakTime == null) {
                $timestamp->breakTime = $dateTimeNow;
                $timestamp->save();
            } elseif ($timestamp->timeOut == null) {
                $image = $validated['image']->store('public/images');
                $imageName = explode('/', $image)[2];

                $timestamp->timeOut = $dateTimeNow;
                $timestamp->imageOut = $imageName;
                $timestamp->save();
            }
            $createdTimestamp = Timestamp::where('id','=', $timestamp->id)->first();
            return $createdTimestamp;

        } else {
            $image = $validated['image']->store('public/images');
            $imageName = explode('/', $image)[2];

            $timestamp = new Timestamp();
            $timestamp->user_id = $user_id;
            $timestamp->imageIn = $imageName;
            $timestamp->save();

            $user = User::find($user_id)->first();
            $user->timestamp()->attach($timestamp, ['date' => $dateNow]);
            $createdTimestamp = Timestamp::where('id','=', $timestamp->id)->first();
            return $timestamp;
           
        }

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
