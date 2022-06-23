<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bantuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sumber_dana_bantuan_id', 'tahun', 'hunian_id'];

    public function sumberDanaBantuan()
    {
        return $this->belongsTo(SumberDanaBantuan::class);
    }
}
