<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $announcements = Announcement::all();

        return view('admin.announcement.admin-announcement', compact('announcements'))->with('status', $request->session()->get('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcement.announcement-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $announcement = new Announcement();
        $announcement->title = $input['title'];
        $announcement->description = $input['description'];
        
        // $announcement->image = $input['image'];
        if (isset($input['image'])) {
            $image = $input['image']->store('public/announcements');
            $imageName = explode('/', $image)[2];
            $announcement->image = $imageName;
        }
        
        $announcement->save();
        // dd($announcement);
        // return $announcement;
        return Redirect::to('admin/announcement')->with('success','Announcement recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $announcement = Announcement::where('id', '=', $id)->first();

        if(Auth::user()->role == 'Admin') {
            return view('admin.announcement.announcement-show', compact('announcement'));
        }
        else {
            return view('timestamp.announcement.announcement-show', compact('announcement'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $announcement = Announcement::where('id', '=', $id)->first();

        return view('admin.announcement.announcement-update', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $announcement = Announcement::where('id', '=', $id)->first();
        $announcement->title = $request->title;
        $announcement->description = $request->description;

        if (isset($request->image)) {
            if(file_exists(storage_path('app/public/announcements/'.$announcement->image))) {
                unlink(storage_path('app/public/announcements/'.$announcement->image));
            }

            $image = $request->image->store('public/announcements');
            $imageName = explode('/', $image)[2];
            // dd($imageName);
            $announcement->image = $imageName;
        }

        $announcement->save();

        return Redirect::to('admin/announcement')->with('success','Announcement updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $announcement = Announcement::where('id', '=', $id)->first();

        if(file_exists(storage_path('app/public/announcements/'.$announcement->image))) {
            unlink(storage_path('app/public/announcements/'.$announcement->image));
        }

        Announcement::where('id', '=', $id)->delete();
        return Redirect::to('admin/announcement')->with('success','Announcement deleted successfully!');
    }
}
