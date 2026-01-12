<?php

namespace App\Http\Controllers;

use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        if(Auth::user()->role_id == 1){
            $tourists = Tourist::all();
            return view('home.admin', compact('tourists'));
        }else{
            $tourists = Tourist::where('user_id', Auth::user()->id)->get();
            return view('home.user', compact('tourists'));
        }

    }
}
