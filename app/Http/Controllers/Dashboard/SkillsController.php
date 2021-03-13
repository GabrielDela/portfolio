<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SkillsController extends Controller
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
        $skills = Skill::all();

        return view('dashboard.skills.index')->with('skills', $skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.skills.create');
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
            "name" => "required",
            "description" => "required",
            "level" => "required",
            "image" => "required|mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();

        $image = $request->file('image');
        $imageName =  Str::uuid()->toString() . $image->getClientOriginalName();
        $path = $image->storeAs('images', $imageName, 'public');
        $input["image_url"] = $imageName;

        $skill = new Skill();
        $skill->name = $input["name"];
        $skill->description = $input["description"];
        $skill->level = $input["level"];
        $skill->image_url = $input["image_url"];
        $skill->save();

        return redirect()->route('dashboard.skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('dashboard.skills.edit', [
            'skill' => $skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Responses
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "level" => "required",
            "image" => "mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();
        $image = $request->file('image');

        if($image){
            $imageName =  Str::uuid()->toString() . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
            Storage::delete(asset('public/images/' . $skill->image_url));
            $input["image_url"] = $imageName;
            $skill->image_url = $input["image_url"];
        }

        $skill->name = $input["name"];
        $skill->description = $input["description"];
        $skill->level = $input["level"];
        
        $skill->save();

        return redirect()->route('dashboard.skills.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        Storage::delete('public/images/' . $skill->image_url);
        // Storage::delete(asset('storage/images/' . $skill->image_url));
        $skill->delete();
        return redirect()->route('dashboard.skills.index');
    }
}
