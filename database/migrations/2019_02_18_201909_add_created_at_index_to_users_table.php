<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtIndexToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //Agregar llave foranea de la tabla tipo_usuario para saber a que tipo de usuario es
            $table->integer('id_tipoUsuario')->unsigned()->nullable();
            $table->foreign('id_tipoUsuario')->references('id')->on('tipo_usuarios')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            /*hace un drop a la llave foranea id_tipoUsuario si es que ya existe*/
            $table->dropForeign('id_tipoUsuario');
            $table->dropColumn('id_tipoUsuario');
        });
    }
}
