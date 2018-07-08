<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;
use App\Election;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id','DESC')->get();
        return view('admin/elections/index',compact('questions')); 
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
        
        $name = str_replace(" ", "_", $request->get('name'));
        $description = $request->get('description');

        $election = new Election;

        $election->name = $name;
        $election->description = $description;
        $register = $election->save();

        $questions = $request->get('question');

        //dump($questions);die();

        for ($i = 0; $i<count($questions); $i++) {
            $insert_question = new Question;
            $insert_question->elections_id = $election->id;
            $insert_question->question = $questions[$i];
            $insert_question->save();
        }

        $message = $register ? 'Elección registrada correctamente' : 'La Elección NO pudo registrarse';
        return redirect()->route('elections.index')->with('message', $message);

        



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
