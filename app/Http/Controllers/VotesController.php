<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Vote;
use App\QuestionVote;
use Auth;
use App\Election;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Election $election)
    {
        
        $questions = Question::orderBy('id','ASC')->where('elections_id',$election->id)->get();

        $id = Auth::user()->id;
        
        $check = Vote::where('elections_id',$election->id)->where('users_id',$id)->first();
        
        if ($check) {
            $message = 'No puedes hacer dos votaciones en una misma elección';
            return redirect()->route('home')->with('error', $message);
        }else {
            return view('users/votes/vote',compact('questions','cont'));
        }
            
    }

    public function store(Request $request)
    {
        
        try {
            $users_id = Auth::user()->id;

            $questions = $request->get('questions_id');
            $votes = $request->get('votes');

            for ($i = 0; $i<count($questions); $i++) {
                $vote = new Vote;
                $vote->elections_id = $request->get('elections_id');
                $vote->questions_id = $questions[$i];
                $vote->users_id = $users_id;
                $vote->vote = $votes[$i];
                $register = $vote->save();

                if ($votes[$i] === 'A') {
                    $questionVote = QuestionVote::where('questions_id',$questions[$i])->first();
                    $questionVote->approved = $questionVote->approved + 1;
                    $questionVote->save();
                }elseif ($votes[$i] === 'N') {
                    $questionVote = QuestionVote::where('questions_id',$questions[$i])->first();
                    $questionVote->abstain = $questionVote->abstain + 1;
                    $questionVote->save();
                }
                elseif ($votes[$i] === 'C') {
                    $questionVote = QuestionVote::where('questions_id',$questions[$i])->first();
                    $questionVote->against = $questionVote->against + 1;
                    $questionVote->save();
                }


            }

            $message = $register ? 'Votación Exitosa, Los resultados se publicaran a las 48 horas de haber iniciado las elecciones' : 'No se pudo registrar la votación';
            return redirect()->route('home')->with('message', $message);

        } catch (\Exception $e) {
            $message = 'No puedes hacer dos votaciones en una misma elección';
            return redirect()->route('home')->with('error', $message);
        }
        
    }

    public function finished()
    {
        $elections = Election::orderBy('id','DESC')->where('active',1)->where('consortiums_id',Auth::user()->consortiums_id)->get();
        return view('users/elections/finished',compact('elections'));    
    }

    public function show($id)
    {
        
        $questions = Question::where('elections_id',$id)->get();

        foreach ($questions as $question) {
            $election = Election::where('id',$question->elections_id)->first();
            $votes[] = QuestionVote::where('questions_id',$question->id)->first();
        }

        return view('users/elections/show',compact('votes','election')); 

    }

}
