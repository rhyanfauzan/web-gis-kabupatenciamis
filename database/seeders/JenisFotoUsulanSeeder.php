<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisFotoUsulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_foto_usulans')->insert([
            'keterangan' => 'Tampak Depan'
        ]);
        DB::table('jenis_foto_usulans')->insert([
            'keterangan' => 'Tampak Samping'
        ]);
        DB::table('jenis_foto_usulans')->insert([
            'keterangan' => 'Tampak Belakang'
        ]);
        DB::table('jenis_foto_usulans')->insert([
            'keterangan' => 'Kondisi Atap'
        ]);
        DB::table('jenis_foto_usulans')->insert([
            'keterangan' => 'Kondisi Dinding'
        ]);
        DB::table('jenis_foto_usulans')->insert([
            'keterangan' => 'Kondisi Lantai'
        ]);
        DB::table('jenis_foto_usulans')->insert([
            'keterangan' => 'Kondisi MCK'
        ]);
    }
}
