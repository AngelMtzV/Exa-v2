<?php

use Illuminate\Database\Seeder;

class estadoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'descripcion' => 'Habilitado',
        ]);
        DB::table('estados')->insert([
            'descripcion' => 'Desabilitado',
        ]);
    }
}
