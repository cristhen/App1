<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;
use App\Election;
use App\Consortium;
use App\Vote;
use DB;
use App\QuestionVote;
use Auth;

class ElectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $consortiums = Consortium::orderBy('id','DESC')->pluck('name','id')->all();
        return view('admin/elections/index',compact('consortiums')); 
    }

    public function active()
    {
        if(Auth::user()->is_master){
            $elections = Election::orderBy('id','DESC')->where('active',0)->get();
            return view('admin/elections/active',compact('elections')); 
        }
        
        $elections = Election::orderBy('id','DESC')->where('active',0)->where('consortiums_id',Auth::user()->consortiums_id)->get();
        return view('admin/elections/active',compact('elections')); 

    }

    public function finished()
    {
        if(Auth::user()->is_master){
            $elections = Election::orderBy('id','DESC')->where('active',1)->get();
            return view('admin/elections/active',compact('elections')); 
        }
        
        $elections = Election::orderBy('id','DESC')->where('active',1)->where('consortiums_id',Auth::user()->consortiums_id)->get();
        return view('admin/elections/finished',compact('elections'));    
    }


    public function store(Request $request)
    {
        
        $name = str_replace(" ", "_", $request->get('name'));

        $election = new Election;

        $election->name = $name;
        $election->description = $request->get('description');
        $election->consortiums_id = $request->get('consortiums_id');
        $register = $election->save();

        $questions = $request->get('question');

        for ($i = 0; $i<count($questions); $i++) {
            $insert_question = new Question;
            $insert_question->elections_id = $election->id;
            $insert_question->consortiums_id = $request->get('consortiums_id');
            $insert_question->question = $questions[$i];
            $insert_question->save();
            
            $insert_questionVote = new QuestionVote;
            $insert_questionVote->questions_id = $insert_question->id;
            $insert_questionVote->approved = 0;
            $insert_questionVote->abstain = 0;
            $insert_questionVote->against = 0;
            $insert_questionVote->save();
            
        }
        
        $message = $register ? 'Elección registrada correctamente' : 'La Elección NO pudo registrarse';
        return redirect()->route('elections.index')->with('message', $message);
    }

    public function show($id)
    {
        
        //$questions = Question::where('elections_id',$id)->pluck('id')->all();

        $questions = Question::where('elections_id',$id)->get();

        
    
        foreach ($questions as $question) {
            
            $election = Election::where('id',$question->elections_id)->first();
            
            $votes[] = QuestionVote::where('questions_id',$question->id)->get();
        }
        
        /*
        foreach ($votes as $vote) {
            $total[] = $vote[0]->approved + $vote[0]->abstain + $vote[0]->against;
            $approved[] = $vote[0]->approved;
            $abstain[] = $vote[0]->abstain;
            $against[] = $vote[0]->against;

        }*/



        return view('admin/elections/show',compact('votes','election')); 

    }

    public function edit($id)
    {
        $questionVote = QuestionVote::find($id);

        return view('admin/elections/edit',compact('questionVote')); 

    }

    public function update(Request $request, $id)
    {
        $questionVote = QuestionVote::find($id);
        
        $questionVote->approved = $request->get('approved');
        
        $questionVote->abstain = $request->get('abstain');
        $questionVote->against = $request->get('against');
        $updated = $questionVote->save();

        $message = $updated ? 'Votación actualizada correctamente' : 'La Votación NO pudo actualizarse';
        return redirect()->route('elections.edit',$id)->with('message', $message);
    }


    public function finish(Election $election)
    {
        $election->active = 1;
        $updated = $election->save();

        $message = $updated ? 'Votación finalizada!' : 'La Votación NO pudo finalizarse';
        return redirect()->route('elections.index')->with('message', $message);

    }

    public function destroy($id)
    {
        //
    }
}
