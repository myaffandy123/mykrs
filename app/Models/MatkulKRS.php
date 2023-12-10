<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulKRS extends Model
{
    use HasFactory;

    protected $table = 'matkul_krs';

    public function krs() {
        return $this->belongsTo(KRS::class);
    }
    public function mata_kuliah() {
        return $this->belongsTo(MataKuliah::class);
    }

    protected $fillable = [
        'mata_kuliah_id',
        'k_r_s_id',
    ];
}
