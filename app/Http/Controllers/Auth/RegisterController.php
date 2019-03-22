<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Tipo_usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Session;

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
        $this->middleware('auth');
    }


    public function showRegistrationForm()
    {
        $tiposDusuarios = Tipo_usuario::get();
        return view('auth.register', compact('tiposDusuarios'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'apellidos' => ['required', 'string', 'max:255'],
            'usuario' => ['required', 'string', 'max:255'],
            'estado_civil' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'profesion' => ['required', 'string', 'max:255'],
            'telefono' => ['required'],
            'celular' => ['required'],
            'genero' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_tipoUsuario' => $data['id_tipoUsuario'],
            'remember_token' => $data['_token'],
            'apellidos' => $data['apellidos'],
            'usuario' => $data['usuario'],
            'profesion' => $data['profesion'],
            'telefono' => $data['telefono'],            
            'celular' => $data['celular'],
            'estado' => $data['estado'],
            'genero' => $data['genero'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'estado_civil' => $data['estado_civil'],
        ]);
    }

    //Sobrescribe el metodo del archivo vendor para poder redirigir a otra vista y que no entre como un usuario logueado 
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Session::flash('message','Usuario agregado correctamente');
        return redirect()->route('home');
    }
}
