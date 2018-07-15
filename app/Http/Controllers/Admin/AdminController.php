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


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/index');
    }




    //METHOD CONSORTIUM
    public function consortiums()
    {
        $consortium = Consortium::orderBy('id','DESC')->where('active',0)->get();
        return view('admin/consortium/index',compact('consortium'));   
    }

    public function newConsortium(Request $request)
    {

        $consortium = new Consortium();

        $consortium->name = $request->nombre;

        $register = $consortium->save();

        $message = $register ? 'Consorcio registrado correctamente' : 'El Consorcio NO pudo registrarse';
        return redirect()->route('consortiums')->with('message', $message);
    }

    public function editConsortium(Request $request, Consortium $consortium)
    {
        $consortium->name = $request->get('name');
        $updated = $consortium->update();
        
        $message = $updated ? 'Consorcio actualizado correctamente' : 'El Consorcio NO pudo actualizarse';
        return redirect()->route('consortiums')->with('message', $message);

    }

    public function deleteConsortium(Consortium $consortium)
    {
        $consortium->active = '1';
        $consortium->update;

        $deleted = $consortium->update();

        $message = $deleted ? 'Consorcio eliminado correctamente!' :  'El Consorcio No pudo eliminarse!';
        return redirect()->route('consortiums')->with('message', $message);        
    }


    public function questions()
    {
        return view('admin/questions/index');   
    }

    public function voting()
    {
        return view('admin/voting/index');   
    }

    
}
