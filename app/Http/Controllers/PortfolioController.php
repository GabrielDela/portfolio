<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Job;
use App\Models\School;
use App\Models\Skill;
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
        $stat->date_log = date("Y-m-d");
        $stat->save();

        $messages = [];
        $hero = Image::where('usage', 'hero')->first();
        $jobs = Job::all();
        $schools = School::all();
        $skills = Skill::all();
        
        return view('index')->with('hero', $hero)->with('messages', $messages)->with('jobs', $jobs)->with('schools', $schools)->with('skills', $skills);
    }

    /**
     * Send the mail from contact Form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'message' => 'required',
                'email' => 'required|email',
            ],
            [
                'firstname.required' => 'Le champ Prénom est requis pour ce formulaire.',
                'lastname.required'  => 'Le champ Nom est requis pour ce formulaire.',
                'message.required'   => 'Vous devez ajouter un message a ce formulaire.',
                'email.required'     => "Le champ Email est requis pour ce formulaire",
                'email.email'        => "L'E-mail renseigné n'est pas valide",
            ],
        );

        $input = $request->all();

        $firstname = $input['firstname'];
        $lastname = $input['lastname'];
        $message = $input['message'];
        $email = $input['email'];

        Mail("gabrieldelahaye76680@gmail.com", "Portfolio: " . $firstname . " " . $lastname, $message . "<br> En provenance de :" . $email);

        $messages = ["Votre message à été envoyé, je vous remercie !"];
        $hero = Image::where('usage', 'hero')->first();
        $jobs = Job::all();
        $schools = School::all();
        $skills = Skill::all();
        
        return view('index')->with('hero', $hero)->with('messages', $messages)->with('jobs', $jobs)->with('schools', $schools)->with('skills', $skills);
    }
}
