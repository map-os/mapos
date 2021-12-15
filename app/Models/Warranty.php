<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    protected $table = 'warrantys';

    protected $fillable = [
        'date_warranty',
        'ref_warranty',
        'text_warranty',
        'user_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
