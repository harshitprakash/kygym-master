<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    Protected $fillable = [
        'cat_it',
        'exercise_name',
        'instructions',
        'effect_on',
    ];

}
