<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Stat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $stat = new Stat();
        if (Auth::user() != "") {
            $value = Auth::user()["name"] . " s'est connecté.";
        } else {
            $value = "Un invité s'est connecté.";
        }
        $stat->action = $value;
        $stat->date_log = date("Y-m-d");
        $stat->ip_address = $_SERVER['REMOTE_ADDR'];
        $stat->save();

        $hero = Image::where('usage', 'hero')->first();

        return view('index')->with('hero', $hero);
    }

    /**
     * Send the mail from contact Form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "message" => "required",
            "email" => "required|email",
        ]);

        $input = $request->all();

        $firstname = $input['firstname'];
        $lastname = $input['lastname'];
        $message = $input['message'];
        $email = $input['email'];

        Mail("gabrieldelahaye76680@gmail.com", "Portfolio: " . $firstname . " " . $lastname, $message . "<br> En provenance de :" . $email);


        $hero = Image::where('usage', 'hero')->first();
        return view('index')->with('hero', $hero);
    }
}