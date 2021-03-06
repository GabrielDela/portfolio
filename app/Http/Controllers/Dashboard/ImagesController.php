<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImagesController extends Controller
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
        $image = Image::all();

        return view('dashboard.images.index')->with('images', $image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.images.create');
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
            "usage" => "required",
            "title" => "required",
            "text" => "required",
            "image" => "required|mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();

        $img = $request->file('image');
        $imageName =  Str::uuid()->toString() . $img->getClientOriginalName();
        $path = $img->storeAs('images', $imageName, 'public');
        $input["image_url"] = $imageName;

        $image = new Image();
        $image->usage = $input["usage"];
        $image->title = $input["title"];
        $image->text = $input["text"];
        $image->image_url = $input["image_url"];
        $image->save();

        return redirect()->route('dashboard.images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('dashboard.images.edit', [
            'image' => $image,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Responses
     */
    public function update(Request $request, Image $image)
    {
        $request->validate([
            "usage" => "required",
            "title" => "required",
            "text" => "required",
            "image" => "mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();
        $img = $request->file('image');

        if($img){
            $imageName =  Str::uuid()->toString() . $img->getClientOriginalName();
            $path = $img->storeAs('images', $imageName, 'public');
            Storage::delete(asset('public/images/' . $image->image_url));
            $input["image_url"] = $imageName;
            $image->image_url = $input["image_url"];
        }

        $image->usage = $input["usage"];
        $image->title = $input["title"];
        $image->text = $input["text"];


        $image->save();

        return redirect()->route('dashboard.images.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        Storage::delete('public/images/' . $image->image_url);
        $image->delete();
        return redirect()->route('dashboard.images.index');
    }
}
