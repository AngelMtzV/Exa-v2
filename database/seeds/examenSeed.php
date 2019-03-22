<?php

use Illuminate\Database\Seeder;

class examenSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examens')->insert([
            'id' => '1',
            'nombre' => 'Examen de java',
            'fecha' => '2019-03-16',
            'tiempo' => '01:00:00',
            'descripcion' => 'Contesta las preguntas antes de que tu tiempo se agote',
            'no_preguntas' => '5',
            'id_estado' => '1',
        ]);

        DB::table('examens')->insert([
            'id' => '2',
            'nombre' => 'Examen de PHP',
            'fecha' => '2019-03-16',
            'tiempo' => '01:00:00',
            'descripcion' => 'Contesta las preguntas antes de que tu tiempo se agote',
            'no_preguntas' => '5',
            'id_estado' => '1',
        ]);
    }
}
