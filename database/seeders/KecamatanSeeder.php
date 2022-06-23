<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $raw = file_get_contents(database_path('seeders/data/kecamatan.json'));
        $array = json_decode($raw);

        foreach ($array as $item)
        {
            DB::table('kecamatans')->insert([
                'kode' => $item->id,
                'nama' => $item->name,
                'koordinat' => $item->coordinates,
                'jenis_koordinat' => $item->map_type
            ]);
        }
    }
}
