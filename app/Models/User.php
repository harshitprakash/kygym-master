<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'member_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'status',
        'current_password',
        'confirm_password',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function attendance() {
        return $this->hasMany(attendance::class, 'member_id');
    }

    public function info(){
        return $this->hasOne(user_info::class, 'member');
    }

    public function emergency() {
        return $this->hasOne(emergencyContact::class, 'member');
    }

    public function documents() {
        return $this->hasOne(userDocs::class, 'member');
    }

    public function BMI() {
        return $this->hasOne(Healthcare::class, 'member_id')->latest();
    }

    public function PackReq() {
        return $this->hasOne(PackRequest::class, 'member');
    }

    public function PackData() {
        return $this->hasMany(PackRequest::class, 'updated_by');
    }

    public function Access() {
        return $this->hasOne(Door::class, 'member');
    }

    public function Fingers() {
        return $this->hasMany(Fingerprints::class, 'member');
    }

    public function RFID() {
        return $this->hasOne(RfidCard::class, 'member');
    }

    public function Collection() {
        return $this->hasOne(FeeCollection::class, 'member');
    }

    public function Collector() {
        return $this->hasOne(FeeCollection::class, 'by');
    }

    public function CheckAllowed($mid) {
        $user = User::find($mid);
        $type = $user->info->role_id;
        if ($type !== 5) {
            return true;
        } else {
            $date = $user->Access->access_till;
            $today = date('Y-m-d');
            if ($date !== null) {
                $remain = strtotime($date)-strtotime($today);
                $available = round(($remain/24)/60/60);
                if ($available >= -3) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

}
