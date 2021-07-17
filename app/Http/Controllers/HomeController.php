<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Oxygen;
use App\Volunteer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->except(['home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $oxygens = Oxygen::all();

        return view('index', compact('oxygens'));
    }

    /**
     *
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $volunteers = Volunteer::count();
        $oxygens = Oxygen::count();
        $donations = Donation::count();
        return view('home', compact('volunteers', 'oxygens', 'donations'));
    }
}
