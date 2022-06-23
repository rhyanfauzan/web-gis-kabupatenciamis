<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FisikBangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fisik_bangunans')->insert([
            'nama' => 'Non Permanen',
            'ikon' => 'non_permanen.png'
        ]);
        DB::table('fisik_bangunans')->insert([
            'nama' => 'Permanen',
            'ikon' => 'permanen.png'
        ]);
        DB::table('fisik_bangunans')->insert([
            'nama' => 'Semi Permanen',
            'ikon' => 'semi_permanen.png'
        ]);
    }
}
