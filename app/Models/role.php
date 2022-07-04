<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rolePermission() {
        return $this->hasOne(permission::class, 'role_id');
    }

    public function userInfo() {
        return $this->hasOne(user_info::class, 'id');
    }
}
