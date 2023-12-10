<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // public function mata_kuliah(): BelongsToMany {
    //     return $this->belongsToMany(MataKuliah::class);
    // }

    public function matkul_krs(): HasMany {
        return $this->HasMany(MatkulKRS::class);
    }

    protected $fillable = [
        'nama',
        'deskripsi',
        'user_id'
    ];
}
