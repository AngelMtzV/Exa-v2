<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\enviarEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\User;
use Alert;

class MailController extends Controller
{
    public function send($id){
        $user = User::find($id);
        $email = $user->email;
        Mail::to($email)->send(new enviarEmail($user));

        Alert::success('El correo se envió correctamente', '¡Éxito!')->autoclose(3000);
        //Session::flash('message','Pregunta agregada correctamente');
        return back();
     }
}
