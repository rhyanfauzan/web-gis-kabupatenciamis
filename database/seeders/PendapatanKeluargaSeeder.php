<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendapatanKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pendapatan_keluargas')->insert([
            'nama' => '0-1 juta'
        ]);
        DB::table('pendapatan_keluargas')->insert([
            'nama' => '1-2,5 juta'
        ]);
        DB::table('pendapatan_keluargas')->insert([
            'nama' => '>2,5 juta'
        ]);
    }
}
