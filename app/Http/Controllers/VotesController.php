<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Vote;
use App\QuestionVote;
use Auth;


class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id','ASC')->get();

        return view('users/votes/vote',compact('questions','cont'));
    }

    public function pending()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
