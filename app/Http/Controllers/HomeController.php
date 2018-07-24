<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $election = Election::where('active', 0)->where('consortiums_id',Auth::user()->consortiums_id)->first();
        return view('home',compact('election'));
    }
}
