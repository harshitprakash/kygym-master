<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fingerprints extends Model
{
    use HasFactory;

    protected $fillable = [
        'member',
        'machine',
        'finger',
        'added',
        'status',
    ];

    /**
     * @return BelongsTo
     */
    public function User() {
        return $this->belongsTo(User::class, 'member');
    }
}
