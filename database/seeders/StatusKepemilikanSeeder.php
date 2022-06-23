<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKepemilikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_kepemilikans')->insert([
            'nama' => 'SHM'
        ]);
        DB::table('status_kepemilikans')->insert([
            'nama' => 'Hak Guna'
        ]);
        DB::table('status_kepemilikans')->insert([
            'nama' => 'Akta Jual Beli'
        ]);
    }
}
