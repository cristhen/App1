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
        

        $finish = Election::where('active', 1)->where('consortiums_id',Auth::user()->consortiums_id)->count();
        

        //dump($finish);die();

        return view('home',compact('election','finish'));
    }

}
