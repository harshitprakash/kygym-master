<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RfidCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'member',
        'card',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function User() {
        return $this->belongsTo(User::class, 'member');
    }
}
