<?php

namespace App\Http\Controllers;

use App\Video;
use App\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideocategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videocategories = VideoCategory::all();
        return view('dashboard.videocategory.index', ['videocategories' => $videocategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.videocategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $videocategory = new VideoCategory();
        $videocategory->title = $request->input('title');
        if($videocategory->save()){
            Session::flash('message', 'Successfully saved!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('dashboard.videocategories.index');
        }else{
            Session::flash('message', 'Could not add video category!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('dashboard.videocategories.index');
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
        $videocategory = VideoCategory::findOrFail($id);
        return view('dashboard.videocategory.edit', ['videocategory' => $videocategory]);
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
        $videocategory = VideoCategory::findOrFail($id);
        $videocategory->title = $request->input('title');
        if($videocategory->save()){
            Session::flash('message', 'Successfully updated!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('dashboard.videocategories.index');
        }else{
            Session::flash('message', 'Could not update!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('dashboard.videocategories.index');
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
        $videocategory = VideoCategory::findOrFail($id);
        if($videocategory->delete()){
            Session::flash('message', 'Successfully deleted!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('dashboard.videocategories.index');
        }else{
            Session::flash('message', 'Could not delete!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('dashboard.videocategories.index');
        }
    }
}
