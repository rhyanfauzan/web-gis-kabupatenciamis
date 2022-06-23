<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BentukBangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bentuk_bangunans')->insert([
            'nama' => 'Apartemen',
            'ikon' => 'apartemen.png'
        ]);
        DB::table('bentuk_bangunans')->insert([
            'nama' => 'Deret',
            'ikon' => 'deret.png'
        ]);
        DB::table('bentuk_bangunans')->insert([
            'nama' => 'Kopel',
            'ikon' => 'kopel.png'
        ]);
        DB::table('bentuk_bangunans')->insert([
            'nama' => 'Rusunawa',
            'ikon' => 'rusunawa.png'
        ]);
        DB::table('bentuk_bangunans')->insert([
            'nama' => 'Tunggal',
            'ikon' => 'tunggal.png'
        ]);
    }
}
