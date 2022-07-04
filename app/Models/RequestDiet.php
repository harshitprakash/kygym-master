<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDiet extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'payment',
        'assign',
        'assigned_diet',
        'remarks',
        'bmi'
    ];

    public function Member() {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function Diet() {
        return $this->belongsTo(diet_plan::class, 'assigned_diet');
    }
}
