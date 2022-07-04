<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereBetween(string $string, array $array)
 */
class Door extends Model
{
    use HasFactory;

    protected $fillable = [
        'member',
        'allow',
        'tag_id',
        'auth-key',
        'access_till',
        'last_visit',
        'qr_code'
    ];

    public function User() {
        return $this->belongsTo(User::class, 'member');
    }
}
