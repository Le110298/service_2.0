<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class Emp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empres')->insert([
        'Nombre_emp' => 'Publico en General',
        'dir_emp' => 'Servidor',
        'direc_emp' => 'anonimo',
        'rfc' => '',
        'tel' => '55000000'
        ]);
    }
}
