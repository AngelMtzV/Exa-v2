<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellidos');
            $table->string('usuario');
            $table->string('profesion');
            $table->string('telefono');
            $table->string('celular')->nullable();
            $table->string('estado');
            $table->string('genero');
            $table->string('fecha_nacimiento');
            $table->string('estado_civil');
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
            $table->dropColumn('apellidos');
            $table->dropColumn('usuario');
            $table->dropColumn('profesion');
            $table->dropColumn('telefono');
            $table->dropColumn('estado');
            $table->dropColumn('genero');
            $table->dropColumn('celular');
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('estado_civil');
        });
    }
}
