<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'angel',
            'email' => 'angelmava37@gmail.com',
            'password' => bcrypt('angel123'),
            'apellidos' => 'Martinez V',
            'usuario' => 'Angel Mtz',
            'Profesion' => 'Ing. T.I.',
            'telefono' => '1234567',
            'celular' => '1234567890',
            'estado' => 'Puebla',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '27/07/1997',
            'estado_civil' => 'Soltero',
            'id_tipoUsuario' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Juan',
            'email' => 'angelmava97@gmail.com',
            'password' => bcrypt('angel123'),
            'apellidos' => 'Perez L',
            'usuario' => 'Juan P L',
            'Profesion' => 'Ing. T.I.',
            'telefono' => '1234567',
            'celular' => '1234567890',
            'estado' => 'Puebla',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '27/07/1997',
            'estado_civil' => 'Soltero',
            'id_tipoUsuario' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Maria',
            'email' => 'angelmava337@gmail.com',
            'password' => bcrypt('angel123'),
            'apellidos' => 'Diaz R',
            'usuario' => 'Mary D.R',
            'Profesion' => 'Ing. T.I.',
            'telefono' => '1234567',
            'celular' => '1234567890',
            'estado' => 'Puebla',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '27/07/1997',
            'estado_civil' => 'Soltera',
            'id_tipoUsuario' => '2',
        ]);
    }
}
