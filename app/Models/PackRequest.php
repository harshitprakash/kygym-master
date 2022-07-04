<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereBetween(string $string, string[] $array)
 */
class PackRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'member',
        'package',
        'status',
        'updated_by',
        'method',
        'rejected',
        'remark',
        'discount',
        'coupon_applied',
        'coupon_code',
    ];

    public function Member() {
        return $this->belongsTo(User::class, 'member');
    }

    public function Pack() {
        return $this->belongsTo(packages::class, 'package');
    }

    public function Approver() {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
