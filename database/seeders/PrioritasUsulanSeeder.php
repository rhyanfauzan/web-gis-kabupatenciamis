<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritasUsulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('prioritas_usulans')->insert([
            'urutan' => 1
        ]);
        DB::table('prioritas_usulans')->insert([
            'urutan' => 2
        ]);
        DB::table('prioritas_usulans')->insert([
            'urutan' => 3
        ]);
    }
}
