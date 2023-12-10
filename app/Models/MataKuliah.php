<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
