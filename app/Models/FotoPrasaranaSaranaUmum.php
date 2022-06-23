<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FotoPrasaranaSaranaUmum extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['prasarana_sarana_umum_id', 'jenis', 'foto', 'keterangan'];
}
