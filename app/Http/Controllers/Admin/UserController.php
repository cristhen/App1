<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Consortium;

use App\Http\Requests;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->get();
        $consortiums = Consortium::orderBy('id','DESC')->pluck('name','id')->all();
        
        return view('admin/users/index',compact('users','consortiums')); 
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
    public function store(UserFormRequest $request)
    {
        $user = new User;

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('pasword'));
        $user->role = $request->get('role');
        $user->consortiums_id = $request->get('consortiums_id');
        if (Input::hasFile('avatar')) {
            $file = Input::file('avatar');
            $file->move(public_path().'/img/user/',$file->getClientOriginalName());
            $user->avatar = $file->getClientOriginalName();
        }

        $user->uf_number = str_random(10);

        $register = $user->save();

        $message = $register ? 'Usuario registrado correctamente' : 'El Usuario NO pudo registrarse';
        return redirect()->route('users.index')->with('message', $message);
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
    public function edit(User $user)
    {
        $consortiums = Consortium::orderBy('id','DESC')->pluck('name','id')->all();
        return view('admin/users/edit',compact('user','consortiums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $message = $updated ? 'Usuario actualizado correctamente' : 'El Usuario NO pudo actualizarse';
        return redirect()->route('users.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
    	$user->active = 1;
        $deleted = $user->update();
        $message = $deleted ? 'Usuario eliminado correctamente' : 'El usuario No pudo eliminarse!';
        return back()->with('messaje',$message);
    }
}
