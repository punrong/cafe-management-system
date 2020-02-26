<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drinks;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $user)
    {
        return view('home')->with('user', $user);
        // $drinks_request = Drinks::all();
        // return view('drinks.display')->with('drinks_request', $drinks_request);
    }
}
