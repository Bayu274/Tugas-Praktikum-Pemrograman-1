<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User; 

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran'; // nama tabel di database
    protected $guarded = [
        'id',
    ];

    public function kegiatan(): BelongsTo
    {
        // Foreign key diubah menjadi 'kegiatan_id'
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }

    public function user(): BelongsTo
    {
        // Foreign key diubah menjadi 'user_id'
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}