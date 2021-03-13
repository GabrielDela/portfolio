<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Stat;

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
}
