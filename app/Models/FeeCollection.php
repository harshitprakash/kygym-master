<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereBetween(string $string, string[] $array)
 */
class FeeCollection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Member() {
        return $this->belongsTo(User::class, 'member');
    }

    public function Approver() {
        return $this->belongsTo(User::class, 'by');
    }

    public function Pack() {
        return $this->belongsTo(packages::class, 'package_id');
    }
}
