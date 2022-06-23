<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;
    protected $table = 'usulan';
    protected $guarded = [];
    // protected $fillable = [
    //     'hunian_id',
    //     'sumber_dana_bantuan_id',
    //     'verifikator_id',
    //     'pengusul_id',
    //     'status',
    //     'rencana_penanganan',
    // ];

    public function hunian()
    {
        return $this->belongsTo(Hunian::class, 'hunian_id');
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verifikator_id');
    }

    public function dinas()
    {
        return $this->belongsTo(SumberDanaBantuan::class, 'sumber_dana_bantuan_id');
    }

    public function pengusul()
    {
        return $this->belongsTo(User::class, 'pengusul_id');
    }

    public function penerimaBantuans()
    {
        return $this->hasMany(PenerimaBantuan::class);
    }
}
