<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SchoolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();

        return view('dashboard.schools.index')->with('schools', $schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "school" => "required",
            "location" => "required",
            "missions" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "image" => "required|mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();

        $image = $request->file('image');
        $imageName =  Str::uuid()->toString() . $image->getClientOriginalName();
        $path = $image->storeAs('images', $imageName, 'public');
        $input["image_url"] = $imageName;

        $school = new School();
        $school->title = $input["title"];
        $school->description = $input["description"];
        $school->school = $input["school"];
        $school->location = $input["location"];
        $school->missions = $input["missions"];
        $school->start_date = $input["start_date"];
        $school->end_date = $input["end_date"];
        $school->image_url = $input["image_url"];
        $school->save();

        return redirect()->route('dashboard.schools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('dashboard.schools.edit', [
            'school' => $school,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Responses
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "school" => "required",
            "location" => "required",
            "missions" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "image" => "mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();
        $image = $request->file('image');

        if($image){
            $imageName =  Str::uuid()->toString() . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
            Storage::delete(asset('public/images/' . $school->image_url));
            $input["image_url"] = $imageName;
            $school->image_url = $input["image_url"];
        }

        $school->title = $input["title"];
        $school->description = $input["description"];
        $school->school = $input["school"];
        $school->location = $input["location"];
        $school->missions = $input["missions"];
        $school->start_date = $input["start_date"];
        $school->end_date = $input["end_date"];

        $school->save();

        return redirect()->route('dashboard.schools.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        Storage::delete('public/images/' . $school->image_url);
        $school->delete();
        return redirect()->route('dashboard.schools.index');
    }
}
