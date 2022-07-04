<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diet_plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'level'
    ];
}
