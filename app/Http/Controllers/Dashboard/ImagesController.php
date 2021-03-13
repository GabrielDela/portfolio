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
            "image" => "required|mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();

        $image = $request->file('image');
        $imageName =  Str::uuid()->toString() . $image->getClientOriginalName();
        $path = $image->storeAs('images', $imageName, 'public');
        $input["image_url"] = $imageName;

        $imageModel = new Image();
        $imageModel->usage = $input["usage"];
        $imageModel->image_url = $input["image_url"];
        $imageModel->save();

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
    public function update(Request $request, Image $imageModel)
    {
        $request->validate([
            "usage" => "required",
            "image" => "mimes:jpeg,png,jpg,gif,svg",
        ]);

        $input = $request->all();
        $image = $request->file('image');

        if($image){
            $imageName =  Str::uuid()->toString() . $image->getClientOriginalName();
            $path = $image->storeAs('images', $imageName, 'public');
            Storage::delete(asset('public/images/' . $image->image_url));
            $input["image_url"] = $imageName;
            $image->image_url = $input["image_url"];
        }

        $imageModel->usage = $input["usage"];
        $imageModel->image_url = $input["image_url"];

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
