<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EducationsController extends Controller
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
        $educations = Education::all();

        return view('dashboard.educations.index')->with('educations', $educations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.educations.create');
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

        $education = new Education();
        $education->title = $input["title"];
        $education->description = $input["description"];
        $education->school = $input["school"];
        $education->location = $input["location"];
        $education->missions = $input["missions"];
        $education->start_date = $input["start_date"];
        $education->end_date = $input["end_date"];
        $education->image_url = $input["image_url"];
        $education->save();

        return redirect()->route('dashboard.educations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('dashboard.educations.edit', [
            'education' => $education,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Responses
     */
    public function update(Request $request, Education $education)
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
            Storage::delete(asset('public/images/' . $education->image_url));
            $input["image_url"] = $imageName;
            $education->image_url = $input["image_url"];
        }

        $education->title = $input["title"];
        $education->description = $input["description"];
        $education->school = $input["school"];
        $education->location = $input["location"];
        $education->missions = $input["missions"];
        $education->start_date = $input["start_date"];
        $education->end_date = $input["end_date"];
        $education->image_url = $input["image_url"];

        $education->save();

        return redirect()->route('dashboard.educations.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        Storage::delete('public/images/' . $education->image_url);
        $education->delete();
        return redirect()->route('dashboard.educations.index');
    }
}
