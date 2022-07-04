<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{
    use HasFactory;

    protected $fillable=[
        'member_id',
        'height',
        'weight',
        'bmi',
    ];

    public function Member() {
        return $this->hasMany(User::class, 'member_id', );
    }
}
