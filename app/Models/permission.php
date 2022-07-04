<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'permissions' => 'array'
    ];

    public function roleDetail() {
        return $this->belongsTo(role::class, 'role_id');
    }
}
