<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examens', function (Blueprint $table) {
            //Agregar llave foranea de la tabla examen para saber a que examen pertenece al examen
            $table->integer('id_estado')->unsigned()->nullable();
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examens', function (Blueprint $table) {
             /*hace un drop a la llave foranea id_estado si es que ya existe*/
            $table->dropForeign('id_estado');
            $table->dropColumn('id_estadoid_estado');
        });
    }
}
