<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // public function krs(): BelongsToMany {
    //     return $this->belongsToMany(KRS::class);
    // }

    public function matkul_krs(): HasMany {
        return $this->HasMany(MatkulKrs::class);
    }

    protected $fillable = [
        'nama',
        'kode',
        'sks',
        'kelas',
        'ruang',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'user_id'
    ];
}
