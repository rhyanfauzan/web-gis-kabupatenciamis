<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $raw = file_get_contents(database_path('seeders/data/desa.json'));
        $array = json_decode($raw);

        foreach ($array as $item)
        {
            $kecamatan = Kecamatan::where('kode', $item->district_id)->first();
            DB::table('desas')->insert([
                'kecamatan_id' => $kecamatan->id,
                'kode' => $item->id,
                'nama' => $item->name,
                'koordinat' => json_encode($item->coordinates),
                'jenis_koordinat' => $item->map_type
            ]);
        }
    }
}
