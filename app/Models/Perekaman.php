<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perekaman extends Model
{
    use HasFactory, SoftDeletes;

    public function usulan()
    {
        return $this->belongsTo(Usulan::class);
    }
}
