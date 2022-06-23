<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SumberDanaBantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sumber_dana_bantuans')->insert([
            'nama' => 'DPRKPLH'
        ]);
        DB::table('sumber_dana_bantuans')->insert([
            'nama' => 'Dinsos'
        ]);
        DB::table('sumber_dana_bantuans')->insert([
            'nama' => 'Baznas'
        ]);
        DB::table('sumber_dana_bantuans')->insert([
            'nama' => 'Lainnya'
        ]);
    }
}
