<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packages extends Model
{
    use HasFactory;

    protected $fillable=[

        'package',
        'description',
        'price',
        'duration',
        'personal_trainer',
    ];

    public function Exercise() {
        return $this->hasMany(exercises::class, 'package');
    }

    public function PackRequest() {
        return $this->hasOne(PackRequest::class, 'package');
    }

    public function inform() {
        return $this->hasOne(user_info::class, 'member_id');
    }

    public function Collection() {
        return $this->hasOne(FeeCollection::class, 'package_id');
    }
}
