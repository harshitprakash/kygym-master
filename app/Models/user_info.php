<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    use HasFactory;

    protected  $fillable =[
        'member',
        'mobile',
        'date_of_birth',
        'gender',
        'address',
        'doj',
        'image',
        'state',
        'city',
        'pin_code',
        'role_id',
        'door_access',
        'package_id',
        'created_at',
    ];

    protected $casts = [
        'mobile_verified_at' => 'datetime',
    ];


    public function memberInfo() {
        return $this->belongsTo(User::class, 'member');
    }

    public function roleDetail() {
        return $this->belongsTo(role::class, 'role_id');
    }

    public function getAge($date){
        $age = date_create($date);
        $ages= date_diff(Carbon::now(),$age)->format('%y');
        echo $ages;
    }

    public function Package() {
        return $this->belongsTo(packages::class, 'package_id');
    }
}
