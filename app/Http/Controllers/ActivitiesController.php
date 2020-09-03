<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\City;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('dashboard.activities.index', ['activities' => $activities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('dashboard.activities.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('media')){
            $activity = new Activity();
            $activity->title = $request->input('title');
            $activity->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $activity->description = $request->input('description');
            $activity->city_id = $request->input('city_id');
            $activity->user_id = $request->input('user_id');
            $activity->point = $request->input('point');
            $activity->zone_name = $request->input('zone_name');
            $activity->isYTvideo = false;
            $activity->category = $request->input('category');
            // handle file
            $originalFileName = $request->file('media')->getClientOriginalName();
            $fileExt = $request->file('media')->getClientOriginalExtension();
            $originalFileNameWithoutExt = Str::of($originalFileName)->basename('.'.$fileExt);
            $fileNameToSave = $originalFileNameWithoutExt . '_' . time() . '.' . $fileExt;
            $activity->media_url = 'media/'.$fileNameToSave;
            try{
                $activity->save();
                $request->file('media')->storeAs('public/media', $fileNameToSave);
                Session::flash('message', 'Activity added successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('activities.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('activities.create');
            }
        }else if($request->has('youtube_link')){
            $activity = new Activity();
            $activity->title = $request->input('title');
            $activity->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $activity->description = $request->input('description');
            $activity->city_id = $request->input('city_id');
            $activity->user_id = $request->input('user_id');
            $activity->zone_name = $request->input('zone_name');
            $activity->isYTvideo = true;
            $activity->category = $request->input('category');
            $activity->point = $request->input('point');
            $activity->youtube_link = $request->input('youtube_link');
            try{
                $activity->save();
                Session::flash('message', 'Activity added successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('activities.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('activities.create');
            }
        }else{
            Session::flash('message', 'Please enter a youtube video URL or upload a video');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('dashboard.videos.create');
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
        $activity = Activity::findOrFail($id);
        $cities = City::all();
        return view('dashboard.activities.edit', ['cities' => $cities, 'activity' => $activity]);
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
        $activity = Activity::findOrFail($id);
        if($request->hasFile('media')){
            $activity->title = $request->input('title');
            $activity->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $activity->description = $request->input('description');
            $activity->city_id = $request->input('city_id');
            $activity->user_id = $request->input('user_id');
            $activity->point = $request->input('point');
            $activity->zone_name = $request->input('zone_name');
            $activity->isYTvideo = false;
            $activity->category = $request->input('category');
            // handle file
            $originalFileName = $request->file('media')->getClientOriginalName();
            $fileExt = $request->file('media')->getClientOriginalExtension();
            $originalFileNameWithoutExt = Str::of($originalFileName)->basename('.'.$fileExt);
            $fileNameToSave = $originalFileNameWithoutExt . '_' . time() . '.' . $fileExt;
            $activity->media_url = 'media/'.$fileNameToSave;
            try{
                $activity->save();
                $request->file('media')->storeAs('public/media', $fileNameToSave);
                Session::flash('message', 'Activity added successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('activities.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('activities.create');
            }
        }else if($request->has('youtube_link')){
            $activity->title = $request->input('title');
            $activity->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $activity->description = $request->input('description');
            $activity->city_id = $request->input('city_id');
            $activity->user_id = $request->input('user_id');
            $activity->zone_name = $request->input('zone_name');
            $activity->isYTvideo = true;
            $activity->category = $request->input('category');
            $activity->point = $request->input('point');
            $activity->youtube_link = $request->input('youtube_link');
            try{
                $activity->save();
                Session::flash('message', 'Activity added successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('activities.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('activities.create');
            }
        }else{
            $activity->title = $request->input('title');
            $activity->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $activity->description = $request->input('description');
            $activity->city_id = $request->input('city_id');
            $activity->user_id = $request->input('user_id');
            $activity->zone_name = $request->input('zone_name');
            $activity->isYTvideo = true;
            $activity->category = $request->input('category');
            $activity->point = $request->input('point');
            $activity->youtube_link = $request->input('youtube_link');
            try{
                $activity->save();
                Session::flash('message', 'Activity added successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('activities.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('activities.create');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        if($activity->delete()){
            Session::flash('message', 'Successfully deleted!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('activities.index');
        }else{
            Session::flash('message', 'Could not be deleted!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('activities.index');
        }
    }
}
