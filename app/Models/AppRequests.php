<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class AppRequests extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'place', 'for'];
}
