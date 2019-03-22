<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Examen;
use Session;
use Validator;
use Response;
use Alert;

class adminPreguntasExamen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}
    public function crear($id)
    {
        #Buscamos el examen por el id
        $examen = Examen::find($id);
        #Buscamos las preguntas a travez de id del examen
        $preguntas = Pregunta::where('id_examen', $id)->get();
        $idExamen = $id;
        #consultamos el total de las preguntas del examen 
        $allPreguntas = $examen->no_preguntas;
        #contamos cuantas preguntas hemos agregado
        $totalPreguntas = count($preguntas);
        $cont = 0;
        return view('admin.examenes.addPreguntas', compact('preguntas','idExamen','allPreguntas','totalPreguntas','cont'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'inpPregunta' => 'required',
            'inpOpcion1' => 'required',
            'inpOpcion2' => 'required',
            'inpOpcion3' => 'required',
            'inpIdExamen' => 'required',
            'opcionid' => 'required',
        ]);
        //dd($request);
        //se crea una nueva pregunta
        if($request->file('cargarImg') == null){
           $my_img = "";
        }
        else{
            $my_img = $request->file('cargarImg')->store('imagenPregunta');
        }

        $pregunta =  new Pregunta;
        $pregunta->pregunta = $request->get('inpPregunta');
        $pregunta->imagen = $my_img;
        $pregunta->opcion1 = $request->get('inpOpcion1');
        $pregunta->opcion2 = $request->get('inpOpcion2');
        $pregunta->opcion3 = $request->get('inpOpcion3');
        $pregunta->opcion4 = $request->get('inpOpcion4');
        $pregunta->opcion5 = $request->get('inpOpcion5');
        $pregunta->opcion6 = $request->get('inpOpcion6');
        $pregunta->respuesta = $request->get('opcionid');
        $pregunta->id_examen = $request->get('inpIdExamen');
        //Se guardan los datos
        //dd($pregunta);
        $pregunta->save();
        Alert::success('Pregunta agregada correctamente', '¡Éxito!')->autoclose(3000);
        //Session::flash('message','Pregunta agregada correctamente');
        return back();
        //return redirect()->route('indexE');
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
        $pregunta = Pregunta::find($id);
        $idExamen = $pregunta->id_examen;
        return view('admin.examenes.editPregunta', compact('pregunta', 'idExamen'));
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
        $request->validate([
            'inpPregunta' => 'required',
            'inpOpcion1' => 'required',
            'inpOpcion2' => 'required',
            'inpOpcion3' => 'required',
            'inpIdExamen' => 'required',
            'opcionid' => 'required',
        ]);

        
        #Primero hacemos una condición para que la imagen no se guarde como vacia si esque no se edita
        #si el input de la imagen es diferente de nulo tomamos su valor y lo pasamos al atributo imagen 
        if($request->file('cargarImg') != null){
           #creamos la variable y le asignamos lo que trae el request del input cargarImg
           $my_img = $request->file('cargarImg')->store('imagenPregunta');

           #Buscamos la pregunta a travez de su id y le asignamos a la variable pregunta
           $pregunta = Pregunta::find($id);
           #le pasamos los valores del formulario a los atributos de la entidad pregunta
           $pregunta->pregunta = $request->get('inpPregunta');
           $pregunta->imagen = $my_img;
           $pregunta->opcion1 = $request->get('inpOpcion1');
           $pregunta->opcion2 = $request->get('inpOpcion2');
           $pregunta->opcion3 = $request->get('inpOpcion3');
           $pregunta->opcion4 = $request->get('inpOpcion4');
           $pregunta->opcion5 = $request->get('inpOpcion5');
           $pregunta->opcion6 = $request->get('inpOpcion6');
           $pregunta->respuesta = $request->get('opcionid');
           $pregunta->id_examen = $request->get('inpIdExamen');
           //Se guardan los datos
           $pregunta->save();

           #sacamos el id del examen al que pertenece esa pregunta
           $idExamen = $pregunta->id_examen;
           #Buscamos el examen por el id
           $examen = Examen::find($idExamen);
           #Buscamos las preguntas a travez de id del examen
           $preguntas = Pregunta::where('id_examen', $idExamen)->get();        
           #consultamos el total de las preguntas del examen 
           $allPreguntas = $examen->no_preguntas;
           #contamos cuantas preguntas hemos agregado
           $totalPreguntas = count($preguntas);
           $cont = 0;
           Alert::success('Pregunta actualizada correctamente', '¡Éxito!')->autoclose(3000);
           return view('admin.examenes.addPreguntas', compact('preguntas','idExamen','allPreguntas','totalPreguntas','cont'));
        }else{
            #si el input de la imagen viene vacia, no modificamos ese atributo
            #Buscamos la pregunta a travez de su id y le asignamos a la variable pregunta
            $pregunta = Pregunta::find($id);
            #le pasamos los valores del formulario a los atributos de la entidad pregunta
            $pregunta->pregunta = $request->get('inpPregunta');
            $pregunta->opcion1 = $request->get('inpOpcion1');
            $pregunta->opcion2 = $request->get('inpOpcion2');
            $pregunta->opcion3 = $request->get('inpOpcion3');
            $pregunta->opcion4 = $request->get('inpOpcion4');
            $pregunta->opcion5 = $request->get('inpOpcion5');
            $pregunta->opcion6 = $request->get('inpOpcion6');
            $pregunta->respuesta = $request->get('opcionid');
            $pregunta->id_examen = $request->get('inpIdExamen');
            //Se guardan los datos
            $pregunta->save();

            #sacamos el id del examen al que pertenece esa pregunta
            $idExamen = $pregunta->id_examen;
            #Buscamos el examen por el id
            $examen = Examen::find($idExamen);
            #Buscamos las preguntas a travez de id del examen
            $preguntas = Pregunta::where('id_examen', $idExamen)->get();        
            #consultamos el total de las preguntas del examen 
            $allPreguntas = $examen->no_preguntas;
            #contamos cuantas preguntas hemos agregado
            $totalPreguntas = count($preguntas);
            $cont = 0;
            Alert::success('Pregunta actualizada correctamente', '¡Éxito!')->autoclose(3000);
            return view('admin.examenes.addPreguntas', compact('preguntas','idExamen','allPreguntas','totalPreguntas','cont'));
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         #primero buscamos el usuario que se desea eliminar a travez de su id
        $pregunta = Pregunta::find($id);
        #usamos el metodo delete para destruirlo
        $pregunta->delete();
        Alert::success('La pregunta se elimino correctamente', '¡Éxito!')->autoclose(3000);
        return back();
    }

    public function editImg(Request $request, $id){
        #Validamos que introduzca una imagen 
        $request->validate([
            'cargarImgE' => 'required',
        ]);
        #buscamos la pregunta a travez de su id y se lo pasamos a la variable
        $pregunta = Pregunta::find($id);       
        #creamos una varianle y le pasamos el valos del input 
        $my_imgE = $request->file('cargarImgE')->store('imagenPregunta');
        #le asignamos lo que tiene la variable del input a el atributo imagen que viene de la BD
        $pregunta->imagen = $my_imgE;
        #finalmente guardamos la actualizacion
        $pregunta->save();
        #regresamos a la pagina con la imagen actualizada
        Alert::success('Imagen actualizada correctamente', '¡Éxito!')->autoclose(3000);
        return back();
    }
}
