<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use http\Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.slider.index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $originalFileName = $request->file('image')->getClientOriginalName();
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $originalFileNameWithoutExt = Str::of($originalFileName)->basename('.'.$fileExt);
            $fileNameToSave = $originalFileNameWithoutExt . '_' . time() . '.' . $fileExt;
            $slider = new Slider();
            $slider->link = 'img/sliders/'.$fileNameToSave;
            try{
                $slider->save();
                $request->file('image')->storeAs('public/img/sliders', $fileNameToSave);
                Session::flash('message', 'Slider added successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('dashboard.sliders.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('dashboard.sliders.create');
            }
        }else{
            Session::flash('message', 'No file uploaded!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('dashboard.sliders.create');
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
        $slider = Slider::findOrFail($id);
        return view('dashboard.slider.edit', ['slider' => $slider]);
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
        $slider = Slider::findOrFail($id);
        if($slider->delete()){
            Session::flash('message', 'Successfully Deleted!');
            Session::flash('alert-class', 'alert-success');
            File::delete(app_path().'/../storage/app/public/'.$slider->link);
            return redirect()->route('dashboard.sliders.index');
        }
    }
}
