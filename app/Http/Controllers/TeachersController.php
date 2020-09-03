<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('type', 'teacher')->get();
        return view('dashboard.teachers.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(isset($user)){
            Session::flash('message', 'User already exists');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('teacher.create');
        }else{
            $user = new User();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = 'teacher';
        $user->gender = $request->gender;
        $user->name_of_the_school = $request->name_of_the_school;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->country = $request->country;
        $splittedName = explode(' ', $request->name);
        $firstName = $splittedName[0];
        $firstLetterOfFirstName = str_split($firstName, 1)[0];
        $lastName = $splittedName[count($splittedName) - 1];
        $firstLetterOfLastName = str_split($lastName, 1)[0];
        $firstLetterOfCountry = str_split($request->country, 1)[0];
        $secondLetterOfCountry = str_split($request->country, 1)[1];
        $firstLetterOfCity = str_split($request->city, 1)[0];
        $secondLetterOfCity = str_split($request->city, 1)[1];
        $randomNumber = rand(000, 999);
        $teacher_code = $firstLetterOfCountry.$secondLetterOfCountry.$firstLetterOfCity.$secondLetterOfCity.$firstLetterOfFirstName.$firstLetterOfLastName.$randomNumber;
        $user->teacher_code = strtolower($teacher_code);
        $password = Hash::make($request->password);
        $user->password = $password;
        if($user->save()){
            Session::flash('message', 'Teacher added!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('teacher.index');
        }else{
            Session::flash('message', 'Could not add teacher due to server error.');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('teacher.create');
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
        $teacher = User::findOrFail($id);
        return view('dashboard.teachers.edit', ['teacher' => $teacher]);
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
        $teacher = User::findOrFail($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->type = 'teacher';
        $teacher->gender = $request->gender;
        $teacher->name_of_the_school = $request->name_of_the_school;
        $teacher->address = $request->address;
        $teacher->city = $request->city;
        $teacher->zip = $request->zip;
        $teacher->country = $request->country;
        $splittedName = explode(' ', $request->name);
        $firstName = $splittedName[0];
        $firstLetterOfFirstName = str_split($firstName, 1)[0];
        $lastName = $splittedName[count($splittedName) - 1];
        $firstLetterOfLastName = str_split($lastName, 1)[0];
        $firstLetterOfCountry = str_split($request->country, 1)[0];
        $secondLetterOfCountry = str_split($request->country, 1)[1];
        $firstLetterOfCity = str_split($request->city, 1)[0];
        $secondLetterOfCity = str_split($request->city, 1)[1];
        $randomNumber = rand(000, 999);
        $teacher_code = $firstLetterOfCountry.$secondLetterOfCountry.$firstLetterOfCity.$secondLetterOfCity.$firstLetterOfFirstName.$firstLetterOfLastName.$randomNumber;
        $teacher->teacher_code = strtolower($teacher_code);
        if($request->has('password')){
            $password = Hash::make($request->password);
            $teacher->password = $password;
        }
        if($teacher->save()){
            Session::flash('message', 'Teacher updated!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('teacher.index');
        }else{
            Session::flash('message', 'Could not edit teacher due to server error.');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('teacher.edit', $id);
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
        $teacher = User::findOrFail($id);
        if($teacher->delete()){
            Session::flash('message', 'Successfully deleted!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('teacher.index');
        }else{
            Session::flash('message', 'Could not be deleted!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('teacher.index');
        }
    }
}
