<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Examen;
use App\Pregunta;
use App\Calificacion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $idUser = auth()->user()->id;
        $examenes = Examen::orderBy('created_at', 'desc')->get();
        $Allexamenes = Examen::orderBy('created_at', 'desc')->get();
        $usuarios = User::get();

        $arrayExaContes = array();
        $arrayAllExa = array();
        foreach ($Allexamenes as $key => $value) {

            $consulta = DB::select('SELECT DISTINCT 
            users.id as idUsuario, users.name, 
            calificacions.id_usuario as Califi_idUser, calificacions.id_examen as Califi_idExamen,
            examens.id as idExamen, examens.nombre as NombreExamen

            from users, examens, calificacions 

            where users.id and calificacions.id_usuario = ?
            and users.id = calificacions.id_usuario

            and examens.id and calificacions.id_examen = ?
            and examens.id = calificacions.id_examen;',[$idUser,$value->id]);
            
            if ($consulta != []) {
                $arrayExaContes[]=$consulta[0]->idExamen;
            }
            $arrayAllExa[]= $value->id;
        }

        $resultadoArreglos = array_diff($arrayAllExa, $arrayExaContes);

        $exaNoContestados = array();
        foreach ($resultadoArreglos as $key => $value) {
            $exaNoContestados[]= DB::select('select * from examens where id = ?',[$value]);
        }

        $exaContestados = array();
        foreach ($arrayExaContes as $key => $value) {
            $exaContestados[]= Examen::where('id',$value)->get();
        }

        return view('home',compact('usuarios', 'examenes','exaContestados','exaNoContestados','arrayExaContes','arrayAllExa'));
    }

    public function examen($id){
        $examen = Examen::find($id);
        $preguntas = Pregunta::where('id_examen',$id)->get();
        $cont = 0;
        //dd($data);
        $exaTiempo = Examen::find($id);
        $hora = $exaTiempo->tiempo;
        list($horas, $minutos, $segundos) = explode(':', $hora);
        $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
        $min = $hora_en_segundos/60;
        $hr = $min/60;
        return view('user.examen', compact('preguntas','examen','cont','hora_en_segundos','horas','minutos','segundos'));
    }

    public function preguntas(){
        $preguntas = Pregunta::where('id_examen',1)->get();
        //dd($preguntas);
        return response()->json($preguntas);
    }
}
