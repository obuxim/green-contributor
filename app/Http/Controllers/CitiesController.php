<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('dashboard.cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $city = City::where('name', $name)->first();
        if(isset($city)){
            Session::flash('message', 'City already exists!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('cities.create');
        }else{
            $city = new City();
        }
        $city->name = $request->name;
        $city->description = $request->description;
        // handle file
        $originalFileName = $request->file('landscape')->getClientOriginalName();
        $fileExt = $request->file('landscape')->getClientOriginalExtension();
        $originalFileNameWithoutExt = Str::of($originalFileName)->basename('.'.$fileExt);
        $fileNameToSave = $originalFileNameWithoutExt . '_' . time() . '.' . $fileExt;
        $city->landscape = 'landscape/'.$fileNameToSave;
        try{
            $city->save();
            $request->file('landscape')->storeAs('public/landscape', $fileNameToSave);
            Session::flash('message', 'City added successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('cities.index');
        }catch (Exception $error){
            Session::flash('message', $error->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('cities.create');
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
        $city = City::findOrFail($id);
        return view('dashboard.cities.edit', ['city' => $city]);
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
        $city = City::findOrFail($id);
        if($request->hasFile('landscape')){
            $city->name = $request->name;
            $city->description = $request->description;
            // handle file
            $originalFileName = $request->file('landscape')->getClientOriginalName();
            $fileExt = $request->file('landscape')->getClientOriginalExtension();
            $originalFileNameWithoutExt = Str::of($originalFileName)->basename('.'.$fileExt);
            $fileNameToSave = $originalFileNameWithoutExt . '_' . time() . '.' . $fileExt;
            $city->landscape = 'landscape/'.$fileNameToSave;
            try{
                $city->save();
                $request->file('landscape')->storeAs('public/landscape', $fileNameToSave);
                Session::flash('message', 'City edited successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('cities.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('cities.edit', $id);
            }
        }else{
            $city->name = $request->name;
            $city->description = $request->description;
            try{
                $city->save();
                Session::flash('message', 'City edited successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('cities.index');
            }catch (Exception $error){
                Session::flash('message', $error->getMessage());
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('cities.edit', $id);
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
        $city = City::findOrFail($id);
        if($city->delete()){
            Session::flash('message', 'Deleted successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('cities.index');
        }else{
            Session::flash('message', 'Could not delete!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('cities.index');
        }
    }
}
