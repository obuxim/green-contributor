<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('dashboard.events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('dashboard.events.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->time = Carbon::parse($request->time);
        $event->city_id = $request->city;
        $event->country = $request->country;
        $event->zoom_link = $request->zoom_link;
        $event->crowdfund_link = $request->crowdfund_link;

        if($event->save()){
            Session::flash('message', 'Event added successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('events.create');
        }else{
            Session::flash('message', 'Failed to add event!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('events.create');
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
        $event = Event::findOrFail($id);
        $cities = City::all();
        return view('dashboard.events.edit', ['event' => $event, 'cities' => $cities]);
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
        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->time = Carbon::parse($request->time);
        $event->city_id = $request->city;
        $event->country = $request->country;
        $event->zoom_link = $request->zoom_link;
        $event->crowdfund_link = $request->crowdfund_link;

        if($event->save()){
            Session::flash('message', 'Event added successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('events.index');
        }else{
            Session::flash('message', 'Failed to add event!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('events.index');
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
        $event = Event::findOrFail($id);
        if($event->delete()){
            Session::flash('message', 'Successfully deleted!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('events.index');
        }else{
            Session::flash('message', 'Could not be deleted!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('events.index');
        }
    }
}
