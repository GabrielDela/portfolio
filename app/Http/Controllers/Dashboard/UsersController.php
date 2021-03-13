<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\EmailExists;
use App\Rules\IsMainAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        $users = User::all();

        return view('dashboard.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
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
            "email" => "required|email",
            "emailConfirm" => "required|same:email",
            "password" => "required|min:6",
            "passwordConfirm" => "required|min:6|same:password",
        ]);

        $this->validate($request, ['email' => new EmailExists()]);

        $input = $request->all();
        $user = new User();
        $user->name = $input["name"];
        $user->email = $input["email"];
        $user->password = Hash::make($input["password"]);
        $user->save();

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Responses
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => "required",
        ]);

        $user->update($request->all());
        $user->save();

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $request = new Request([
            'email' => $user->email,
        ]);

        $this->validate($request, ['email' => new IsMainAccount()]);

        $user->delete();
        return redirect()->route('dashboard.users.index');
    }
}
