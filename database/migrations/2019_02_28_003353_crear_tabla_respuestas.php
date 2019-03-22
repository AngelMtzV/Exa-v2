<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pregunta');
            $table->integer('respuesta');
            $table->string('respuestaPre');
            //Agregar llave foranea de la tabla users para saber a que usuario pertenece la calificacion
            $table->integer('id_usuario')->unsigned()->nullable();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('set null'); 
            //Agregar llave foranea de la tabla examen para saber a que examen pertenece la calificacion
            $table->integer('id_examen')->unsigned()->nullable();
            $table->foreign('id_examen')->references('id')->on('examens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
        /*hace un drop a la llave foranea id_usuario si es que ya existe*/
        $table->dropForeign('id_usuario');
        $table->dropColumn('id_usuario');
        /*hace un drop a la llave foranea id_examen si es que ya existe*/
        $table->dropForeign('id_examen');
        $table->dropColumn('id_examen');
    }
}
