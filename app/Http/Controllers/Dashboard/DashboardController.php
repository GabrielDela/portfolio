<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $stats = Stat::where('date_log', 'like', date('Y-m-d'))->get();

        return view('dashboard')->with('stats', $stats);
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
            "image" => "required|mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();

        $image = $request->file('image');
        $imageName =  Str::uuid()->toString() . $image->getClientOriginalName();
        $path = $image->storeAs('images', $imageName, 'public');
        $input["image_url"] = $imageName;

        $job = new ImageMain();
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
}
