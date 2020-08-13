<?php

namespace App\Http\Controllers;

use App\VideoCategory;
use App\Video;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('dashboard.video.index', ['videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videocategories = VideoCategory::all();
        return view('dashboard.video.create', ['videocategories'=>$videocategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('video')){
            $video = new Video();
            $video->title = $request->input('title');
            $video->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $video->description = $request->input('description');
            $video->city_name = $request->input('city_name');
            $video->zone_name = $request->input('zone_name');
            $video->isYTvideo = false;
            $category = VideoCategory::findOrFail($request->input('category'));
            // handle file
            $originalFileName = $request->file('video')->getClientOriginalName();
            $fileExt = $request->file('video')->getClientOriginalExtension();
            $originalFileNameWithoutExt = Str::of($originalFileName)->basename('.'.$fileExt);
            $fileNameToSave = $originalFileNameWithoutExt . '_' . time() . '.' . $fileExt;
            $video->video_url = 'videos/'.$fileNameToSave;
            try{
                $video->save();
                $video->videocategory()->associate($category);
                $request->file('video')->storeAs('public/videos', $fileNameToSave);
                Session::flash('message', 'Video added successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('dashboard.videos.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('dashboard.videos.create');
            }
        }else if($request->has('youtube_video')){
            $video = new Video();
            $video->title = $request->input('title');
            $video->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $video->description = $request->input('description');
            $video->city_name = $request->input('city_name');
            $video->zone_name = $request->input('zone_name');
            $video->isYTvideo = true;
            $category = VideoCategory::findOrFail($request->input('category'));
            $video->video_url = $request->input('youtube_video');
            try{
                $video->save();
                $video->videocategory()->associate($category);
                Session::flash('message', 'Video added successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('dashboard.videos.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('dashboard.videos.create');
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
        $video = Video::findOrFail($id);
        return view('dashboard.video.show', ['video' => $video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('dashboard.video.edit', ['video' => $video]);
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
        $video = Video::findOrFail($id);
        if($request->hasFile('video')){
            $video->title = $request->input('title');
            $video->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $video->description = $request->input('description');
            $video->city_name = $request->input('city_name');
            $video->zone_name = $request->input('zone_name');
            $video->isYTvideo = false;
            $category = VideoCategory::findOrFail($request->input('category'));
            // handle file
            $originalFileName = $request->file('video')->getClientOriginalName();
            $fileExt = $request->file('video')->getClientOriginalExtension();
            $originalFileNameWithoutExt = Str::of($originalFileName)->basename('.'.$fileExt);
            $fileNameToSave = $originalFileNameWithoutExt . '_' . time() . '.' . $fileExt;
            $video->video_url = 'videos/'.$fileNameToSave;
            try{
                $video->save();
                $video->videocategory()->associate($category);
                $request->file('video')->storeAs('public/videos', $fileNameToSave);
                Session::flash('message', 'Video updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('dashboard.videos.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('dashboard.videos.create');
            }
        }else if($request->has('youtube_video')){
            $video->title = $request->input('title');
            $video->teacher_or_parent_name = $request->input('teacher_or_parent_name');
            $video->description = $request->input('description');
            $video->city_name = $request->input('city_name');
            $video->zone_name = $request->input('zone_name');
            $video->isYTvideo = true;
            $category = VideoCategory::findOrFail($request->input('category'));
            $video->video_url = $request->input('youtube_video');
            try{
                $video->save();
                $video->videocategory()->associate($category);
                Session::flash('message', 'Video updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('dashboard.videos.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('dashboard.videos.create');
            }
        }else{
            Session::flash('message', 'Please enter a youtube video URL or upload a video');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('dashboard.videos.create');
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
        $video = Video::findOrFail($id);
        if($video->delete()){
            File::delete(app_path().'/../storage/app/public/'.$video->video_url);
            Session::flash('message', 'Successfully deleted!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('dashboard.videos.index');
        }else{
            Session::flash('message', 'Could not delete!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('dashboard.videos.index');
        }
    }
}
