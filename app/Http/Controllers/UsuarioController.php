<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;  // para usar en el método store
use App\Http\Requests\UserUpdateRequest;  // para usar en el método edit

use Illuminate\Support\Facades\Session;  // para usar la Clase Session!!
use Illuminate\Support\Facades\Redirect;  // para usar la Clase Redirect!!
use Illuminate\Validation\Rule; // para poder usar la clase Rule
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use SoftDeletes;


class UsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::paginate(4);

        return view('usuario.index', compact('users') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');

        //return Redirect::to('signup');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //\App\User::create(['name'=>$request['name'], 'email'=>$request['email'], 'password'=> $request['password'] ]);
        User::create($request->all());
        //return redirect('signup')->with('message','store');
        Session::flash('message','Usuario creado correctamente!!');

        return Redirect::to('/signup');
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
    public function edit( $id)
    {
        $user= User::find($id);

        return view('usuario.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $v= Validator::make($request->all(), [
             'email' => ['required', Rule::unique('users')->ignore($id),],
        ]);

        if ($v->fails()) {
            return redirect('/usuario')->withErrors($v)->withInput();
        }    

        $user= User::find($id);

        $user->fill($request->all());

        $user->save();

        Session::flash('message','Usuario editado correctamente!!');
        
        return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User::destroy($id);

        $user=User::find($id);

        $user->delete();    

        Session::flash('message','Usuario eliminado!!');

        return Redirect::to('/usuario');
    }
}
