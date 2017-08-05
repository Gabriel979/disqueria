<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;  // para usar la Clase Session!!
use Illuminate\Support\Facades\Redirect;  // para usar la Clase Redirect!!

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            //'password' => bcrypt($data['password']), el bcrypt ya está implementado en el modelo!!
            'password' => $data['password'],
        ]);
    }



    public function register(Request $request){

        $user = new User();

        $this->validator($request->all())->validate();

        event(new Registered($user= $this->create($request->all())) );

        Mail::to($user->email)->send(new ConfirmationEmail($user));

        Session::flash('message','Por favor confirme su Email! Se ha enviado un link a su correo.');        

        return Redirect::to('register');

    }


    public function confirmEmail($token){

        User::whereToken($token)->firstOrFail()->confirmEmail();

        Session::flash('message','Tu Email ha sido confirmado! Ya puedes iniciar sesión.');    

        return Redirect::to('login');
    }



}
