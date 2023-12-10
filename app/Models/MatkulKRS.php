<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulKrs extends Model
{
    use HasFactory;

    protected $table = 'matkul_krs';

    public function krs() {
        return $this->belongsTo(Krs::class);
    }
    public function mata_kuliah() {
        return $this->belongsTo(MataKuliah::class);
    }

    protected $fillable = [
        'mata_kuliah_id',
        'krs_id',
    ];
}
