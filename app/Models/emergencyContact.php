<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emergencyContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'member',
        'name',
        'relation',
        'mobile',
        'address',
        'created_at',
    ];

    public function member() {
        return $this->belongsTo(User::class, 'member');
    }
}
