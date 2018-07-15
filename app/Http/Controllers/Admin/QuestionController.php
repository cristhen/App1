<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;
use App\Http\Requests;
use App\Http\Requests\QuestionFormRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $questions = Question::orderBy('id','DESC')->get();
        return view('admin/questions/index',compact('questions')); 
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
    public function store(QuestionFormRequest $request)
    {
        $question = new Question;
        
        $question->elections_id = $request->get('elections_id');
        $question->question = $request->get('question');
        
        $register = $question->save();

        $message = $register ? 'Pregunta registrada correctamente' : 'La Pregunta NO pudo registrarse';
        return redirect()->route('questions.index')->with('message', $message);
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
    public function edit(Question $question)
    {
        return view('admin/questions/edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionFormRequest $request, Question $question)
    {
        $question->elections_id = $request->get('elections_id');
        $question->question = $request->get('question');
        $updated = $question->save();

        $message = $updated ? 'Pregunta actualizada correctamente' : 'La Pregunta NO pudo actualizarse';
        return redirect()->route('questions.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->active = 1;
        $deleted = $question->update();
        $message = $deleted ? 'Pregunta eliminada correctamente' : 'La Pregunta No pudo eliminarse!';
        return back()->with('messaje',$message);
    }
}
