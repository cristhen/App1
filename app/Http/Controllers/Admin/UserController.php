<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Consortium;

use App\Http\Requests;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Input;
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->is_master){
            
            $users = User::orderBy('id','DESC')->get();
            $consortiums = Consortium::orderBy('id','DESC')->pluck('name','id')->all();
        
            return view('admin/users/index',compact('users','consortiums')); 
        }
        
        $users = User::orderBy('id','DESC')->where('consortiums_id',Auth::user()->consortiums_id)->get();
        return view('admin/users/index',compact('users')); 
        
    }

    public function store(UserFormRequest $request)
    {
        $user = new User;

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role = $request->get('role');
        $user->consortiums_id = $request->get('consortiums_id');
        if (Input::hasFile('avatar')) {
            $file = Input::file('avatar');
            $file->move(public_path().'/img/user/',$file->getClientOriginalName());
            $user->avatar = $file->getClientOriginalName();
        }

        $user->uf_number = $request->get('uf_number');

        $register = $user->save();

        $message = $register ? 'Usuario registrado correctamente' : 'El Usuario NO pudo registrarse';
        return redirect()->route('users.index')->with('message', $message);
    }

    public function edit(User $user)
    {
        $consortiums = Consortium::orderBy('id','DESC')->pluck('name','id')->all();
        return view('admin/users/edit',compact('user','consortiums'));
    }


    public function update(Request $request, User $user)
    {
        $user->name = $request->get('name');
        if($request->get('password') != ""){
            $user->password = bcrypt($request->get('password'));
            $user->change = 1;
        }
        $user->role = $request->get('role');
        $user->consortiums_id = $request->get('consortiums_id');
        if (Input::hasFile('avatar')) {
            $file = Input::file('avatar');
            $file->move(public_path().'/img/user/',$file->getClientOriginalName());
            $user->avatar = $file->getClientOriginalName();
        }

        $user->uf_number = $request->get('uf_number');

        $updated = $user->save();
        if(Auth::user()->is_user){
            $message = $updated ? 'Perfil actualizado correctamente' : 'El Perfil NO pudo actualizarse';
            return redirect()->route('home')->with('message', $message);
        }
            
        $message = $updated ? 'Usuario actualizado correctamente' : 'El Usuario NO pudo actualizarse';
        return redirect()->route('users.index')->with('message', $message);
    }

    public function destroy(User $user)
    {
    	$user->active = 1;
        $deleted = $user->update();
        $message = $deleted ? 'Usuario eliminado correctamente' : 'El usuario No pudo eliminarse!';
        return back()->with('messaje',$message);
    }
}
