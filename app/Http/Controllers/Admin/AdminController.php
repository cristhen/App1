<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consorcio;
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

    public function users()
    {
        $users = User::orderBy('id','DESC')->get();
        $consortiums = Consorcio::orderBy('id','DESC')->pluck('name','id')->all();
        
        return view('admin/users/index',compact('users','consortiums'));   
    }

    public function newUser(UserFormRequest $request)
    {
        $user = new User;

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('pasword'));
        $user->role = $request->get('role');
        $user->consorcio_id = $request->get('consorcio_id');
        if (Input::hasFile('avatar')) {
            $file = Input::file('avatar');
            $file->move(public_path().'/img/user/',$file->getClientOriginalName());
            $user->avatar = $file->getClientOriginalName();
        }

        $user->uf_number = str_random(10);

        $register = $user->save();

        $message = $register ? 'Usuario registrado correctamente' : 'El Usuario NO pudo registrarse';
        return redirect()->route('users')->with('message', $message);

    }

    public function editUser(UserFormRequest $request, User $user)
    {
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('pasword'));
        $user->role = $request->get('role');
        $user->consorcio_id = $request->get('consorcio_id');
        if (Input::hasFile('avatar')) {
            $file = Input::file('avatar');
            $file->move(public_path().'/img/user/',$file->getClientOriginalName());
            $user->avatar = $file->getClientOriginalName();
        }

        $user->uf_number = str_random(10);

        $updated = $user->update();

        $message = $updated ? 'Usuario actualizado correctamente' : 'El Usuario NO pudo actualizarse';
        return redirect()->route('users')->with('message', $message);
    }











    //METHOD CONSORTIUM
    public function consortiums()
    {
        $consortium = Consorcio::orderBy('id','DESC')->where('active',0)->get();
        return view('admin/consortium/index',compact('consortium'));   
    }

    public function newConsortium(Request $request)
    {

        $consortium = new Consorcio();

        $consortium->name = $request->nombre;

        $register = $consortium->save();

        $message = $register ? 'Consorcio registrado correctamente' : 'El Consorcio NO pudo registrarse';
        return redirect()->route('consortiums')->with('message', $message);
    }

    public function editConsortium(Request $request, Consorcio $consortium)
    {
        $consortium->name = $request->get('name');
        $updated = $consortium->update();
        
        $message = $updated ? 'Consorcio actualizado correctamente' : 'El Consorcio NO pudo actualizarse';
        return redirect()->route('consortiums')->with('message', $message);

    }

    public function deleteConsortium(Consorcio $consortium)
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
