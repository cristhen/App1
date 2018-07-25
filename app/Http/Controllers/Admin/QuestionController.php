<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;
use App\Http\Requests;
use App\Http\Requests\QuestionFormRequest;
use Auth;

class QuestionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        if (Auth::user()->is_master){
            $questions = Question::orderBy('id','DESC')->get();
            return view('admin/questions/index',compact('questions')); 
        } elseif(Auth::user()->is_admin) {
            $questions = Question::orderBy('id','DESC')->where('consortiums_id',Auth::user()->consortiums_id)->get();
            return view('admin/questions/index',compact('questions')); 
        }
            
        
    }

    /*
    public function store(QuestionFormRequest $request)
    {
        $question = new Question;
        
        $question->elections_id = $request->get('elections_id');
        $question->question = $request->get('question');
        
        $register = $question->save();

        $message = $register ? 'Pregunta registrada correctamente' : 'La Pregunta NO pudo registrarse';
        return redirect()->route('questions.index')->with('message', $message);
    }
    */

    public function edit(Question $question)
    {
        return view('admin/questions/edit',compact('question'));
    }


    public function update(QuestionFormRequest $request, Question $question)
    {
        $question->elections_id = $request->get('elections_id');
        $question->question = $request->get('question');
        $updated = $question->save();

        $message = $updated ? 'Pregunta actualizada correctamente' : 'La Pregunta NO pudo actualizarse';
        return redirect()->route('questions.index')->with('message', $message);
    }

    public function destroy(Question $question)
    {
        $question->active = 1;
        $deleted = $question->update();
        $message = $deleted ? 'Pregunta eliminada correctamente' : 'La Pregunta No pudo eliminarse!';
        return back()->with('messaje',$message);
    }
}
