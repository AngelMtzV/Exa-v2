<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class preguntaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preguntas')->insert([
        	'imagen' => '',
            'pregunta' => 'Pregunta uno de prueba',
            'opcion1' => Str::random(10),
            'opcion2' => Str::random(20),
            'opcion3' => Str::random(30),
            'opcion4' => Str::random(10),
            'opcion5' => Str::random(15),
            'opcion6' => Str::random(40),
            'respuesta' => '1',
            'id_examen' => '1',
        ]);
        DB::table('preguntas')->insert([
        	'imagen' => null,
            'pregunta' => Str::random(50),
            'opcion1' => Str::random(10),
            'opcion2' => Str::random(20),
            'opcion3' => Str::random(30),
            'opcion4' => Str::random(10),
            'opcion5' => Str::random(15),
            'opcion6' => Str::random(40),
            'respuesta' => '2',
            'id_examen' => '1',
        ]);
        DB::table('preguntas')->insert([
        	'imagen' => "",
            'pregunta' => Str::random(50),
            'opcion1' => Str::random(10),
            'opcion2' => Str::random(20),
            'opcion3' => Str::random(30),
            'opcion4' => Str::random(10),
            'opcion5' => Str::random(15),
            'opcion6' => Str::random(40),
            'respuesta' => '1',
            'id_examen' => '1',
        ]);
        DB::table('preguntas')->insert([
        	'imagen' => "",
            'pregunta' => Str::random(50),
            'opcion1' => Str::random(10),
            'opcion2' => Str::random(20),
            'opcion3' => Str::random(30),
            'opcion4' => Str::random(10),
            'opcion5' => Str::random(15),
            'opcion6' => Str::random(40),
            'respuesta' => '3',
            'id_examen' => '1',
        ]);
        DB::table('preguntas')->insert([
        	'imagen' => "",
            'pregunta' => Str::random(50),
            'opcion1' => Str::random(10),
            'opcion2' => Str::random(20),
            'opcion3' => Str::random(30),
            'opcion4' => Str::random(10),
            'opcion5' => Str::random(15),
            'opcion6' => Str::random(40),
            'respuesta' => '5',
            'id_examen' => '1',
        ]);
        //////////////////////////////////////
        #Examen con id 2
        DB::table('preguntas')->insert([
        	'imagen' => "",
            'pregunta' => 'En PHP, la sentencia de control foreach se emplea para',
            'opcion1' => 'Recorrer los elementos de un array',
            'opcion2' => 'Recorrer las propiedades de un objeto',
            'opcion3' => 'Recorrer los elementos de un array y las propiedades de un objeto',
            'opcion4' => 'Las anteriores respuestas no son correctas',
            'opcion5' => '',
            'opcion6' => '',
            'respuesta' => '1',
            'id_examen' => '2',
        ]);
        DB::table('preguntas')->insert([
        	'imagen' => "",
            'pregunta' => 'En PHP y con las funciones de expresiones regulares PCRE, si no se quiere tener en cuenta las mayúsculas y minúsculas, se debe emplear el modificador:',
            'opcion1' => 'b',
            'opcion2' => 'g',
            'opcion3' => 'i',
            'opcion4' => 'a',
            'opcion5' => 'Las anteriores respuestas no son correctas',
            'opcion6' => '',
            'respuesta' => '2',
            'id_examen' => '2',
        ]);
        DB::table('preguntas')->insert([
        	'imagen' => "",
            'pregunta' => 'En PHP, ¿un objeto de una clase puede acceder a la parte privada de otro objeto de la misma clase?',
            'opcion1' => 'Sí, siempre',
            'opcion2' => 'Sí, si los dos objetos se han declarado en el mismo contexto',
            'opcion3' => 'No, sólo puede acceder a la parte protegida',
            'opcion4' => 'No, no puede acceder ni a la parte protegida ni a la privada',
            'opcion5' => 'No, nunca',
            'opcion6' => '',
            'respuesta' => '1',
            'id_examen' => '2',
        ]);
        DB::table('preguntas')->insert([
        	'imagen' => "",
            'pregunta' => 'En PHP, para copiar un fichero subido desde un formulario HTML a su destino final se debe emplear',
            'opcion1' => 'cp_uploaded_file()',
            'opcion2' => 'copy_uploaded_file() ',
            'opcion3' => 'mv_uploaded_file()',
            'opcion4' => 'move_uploaded_file() ',
            'opcion5' => 'Ninguna',
            'opcion6' => 'Todas',
            'respuesta' => '3',
            'id_examen' => '2',
        ]);
        DB::table('preguntas')->insert([
        	'imagen' => "",
            'pregunta' => 'En PHP, ¿cuál es la forma correcta de abrir una conexión con una base de datos MySQL?',
            'opcion1' => 'connect_mysql("localhost");',
            'opcion2' => 'dbopen("localhost"); ',
            'opcion3' => ' mysql_open("localhost");',
            'opcion4' => 'mysql_connect("localhost"); ',
            'opcion5' => '',
            'opcion6' => '',
            'respuesta' => '5',
            'id_examen' => '2',
        ]);
    }
}
