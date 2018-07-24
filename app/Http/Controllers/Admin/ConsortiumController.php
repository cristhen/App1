<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consortium;
use App\User;

use App\Http\Requests;
use App\Http\Requests\UserFormRequest;

use Illuminate\Support\Facades\Input;


class ConsortiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $consortium = Consortium::orderBy('id','DESC')->where('active',0)->get();
        return view('admin/consortiums/index',compact('consortium')); 
    }
    
    public function store(Request $request)
    {

        $consortium = new Consortium();
        $consortium->name = $request->nombre;
        $register = $consortium->save();

        $message = $register ? 'Consorcio registrado correctamente' : 'El Consorcio NO pudo registrarse';
        return redirect()->route('consortiums.index')->with('message', $message);
    }

    public function edit($id)
    {
        $consortium = Consortium::where('id',$id)->first();
        return view('admin/consortiums/edit',compact('consortium')); 
    }

    public function update(Request $request, Consortium $consortium)
    {
        $consortium->name = $request->get('name');
        $updated = $consortium->update();
        
        $message = $updated ? 'Consorcio actualizado correctamente' : 'El Consorcio NO pudo actualizarse';
        return redirect()->route('consortiums.index')->with('message', $message);

    }

    public function destroy(Consortium $consortium)
    {
        $consortium->active = '1';
        $consortium->update;

        $deleted = $consortium->update();

        $message = $deleted ? 'Consorcio eliminado correctamente!' :  'El Consorcio No pudo eliminarse!';
        return redirect()->route('consortiums.index')->with('message', $message);        
    }

    
}
