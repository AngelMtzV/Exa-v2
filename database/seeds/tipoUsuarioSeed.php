<?php

use Illuminate\Database\Seeder;

class tipoUsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuarios')->insert([
            'tipo_usuario' => 'Administrador',
        ]);
        DB::table('tipo_usuarios')->insert([
            'tipo_usuario' => 'Usuario',
        ]);
    }
}
