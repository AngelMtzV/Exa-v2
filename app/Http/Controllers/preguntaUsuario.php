<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Calificacion;
use App\Respuesta;
use App\Pregunta;
use App\Examen;
use App\User;
use Session;
use Alert;


class preguntaUsuario extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
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
    public function store(Request $request){
        //Recuperamos el id del usuario logueado
        $idUser = auth()->user()->id;
        $idExamen = $request->get('idExamen');
        if($_POST){
            $count = 0;
            foreach ($_POST as $res=>$valor)
            {   
                $preguntas_Res = Pregunta::where('id_examen', $idExamen)->get();
                //$contador = count($preguntas_Res);
                //dd($preguntas_Res[$count]->respuesta);
                $pregunta_respuesta = $preguntas_Res[$count]->respuesta;

                if ($res != "_token" && $res != "idExamen") {
                    
                    $respuesta = new Respuesta;
                    $respuesta->pregunta = $res;
                    $respuesta->respuestaPre = $pregunta_respuesta;
                    $respuesta->respuesta = $valor[0];
                    $respuesta->id_usuario = $idUser;
                    $respuesta->id_examen = $idExamen;
                    //dd($respuesta);
                    $respuesta->save();
                    $count++;
                }                
            }
        }

        //Consulta tosas las preguntas
        $queryPreguntas = DB::table('preguntas')->where('id_examen',$idExamen)->select('respuesta')->get();
        //consuta todas las respuestas del usuario
        $queryRespuestas = DB::table('respuestas')->where('id_usuario',$idUser)->where('id_examen',$idExamen)->select('respuesta')->get();
        //creamos dos arrays para guardar las respuestas correctas de cada pregunta
        $arrayPregunta = array();
        $arrayP = array();
            //Recorremos la el arreglo de la consulta y sacamos solo el valor de la respuesta correcta
            foreach ($queryPreguntas as $preg=>$valor) {
                $arrayPregunta[$preg]= $valor;
                $pre = json_decode(json_encode($arrayPregunta[$preg]), true);
                $arrayP[]= $pre["respuesta"];
            }
        
        //creamos dos arrays para guardar las respuestas
        $arrayRespuestas = array();
        $arrayR = array();
            //Recorremos la el arreglo de la consulta y sacamos solo el valor de las respuestas 
            foreach ($queryRespuestas as $resp=>$value) {
                $arrayRespuestas[$resp]= $value;
                $res = json_decode(json_encode($arrayRespuestas[$resp]), true);
                $arrayR[]= $res["respuesta"];
            }
        //creamos una variable que con el metodo array_intersect_assoc busca solo los valores que coinciden entre los dos arrays
        $arrayResul = array_intersect_assoc($arrayP, $arrayR);
        //creamos una variable en la cual contendre el valor de todas las respuestas
        $totalRespuestas = count($queryRespuestas);
        //contamos cuantos valores coiinciden entre los valores optenidos de las respuestas correctas de la tabla de preguntas y las de la tabla de respuestas para determinar cuantas respuestas son correctas
        $aciertos = count($arrayResul);
        //se hace la operacion de el total de respuestas menos las respuestas correctas para determinar cuantas respuestas fueron erroneas 
        $errores = $totalRespuestas - $aciertos;
        $calification = ($aciertos*10)/$totalRespuestas;

        $calificacion = new Calificacion;
        $calificacion->aciertos = $aciertos;
        $calificacion->errores = $errores;
        $calificacion->resultado = $calification;
        $calificacion->id_usuario = $idUser;
        $calificacion->id_examen = $idExamen;

        $calificacion->save();
        //$updateExamen = false;
        echo "La calificacion ya esta disponible.";
        /*if ($updateExamen==true) {
            $examen = Examen::find($idExamen);

            $examen->id_estado = "3";
            $examen->save();
        }*/
        Alert::success('Sus respuestas se han enviado correctamente', '¡Éxito!')->autoclose(3000);
        //Session::flash('message','Sus respuestas se han enviado correctamente');
        return redirect()->route('home');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
