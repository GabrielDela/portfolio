<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JobsController extends Controller
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
        $jobs = Job::all();

        return view('dashboard.jobs.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jobs.create');
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
            "society" => "required",
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

        $job = new Job();
        $job->title = $input["title"];
        $job->description = $input["description"];
        $job->society = $input["society"];
        $job->location = $input["location"];
        $job->missions = $input["missions"];
        $job->start_date = $input["start_date"];
        $job->end_date = $input["end_date"];
        $job->image_url = $input["image_url"];
        $job->save();

        return redirect()->route('dashboard.jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('dashboard.jobs.edit', [
            'job' => $job,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Responses
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "society" => "required",
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
            Storage::delete(asset('public/images/' . $job->image_url));
            $input["image_url"] = $imageName;
            $job->image_url = $input["image_url"];
        }

        $job->title = $input["title"];
        $job->description = $input["description"];
        $job->society = $input["society"];
        $job->location = $input["location"];
        $job->missions = $input["missions"];
        $job->start_date = $input["start_date"];
        $job->end_date = $input["end_date"];
        $job->image_url = $input["image_url"];

        $job->save();

        return redirect()->route('dashboard.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        Storage::delete('public/images/' . $job->image_url);
        $job->delete();
        return redirect()->route('dashboard.jobs.index');
    }
}
