<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User_info;

class userDocs extends Model
{
    use HasFactory;

    protected $fillable =[
        'member',
        'document_type',
        'document_number',
        'file_name',
        'created_at',
    ];

    public function member() {
        return $this->belongsTo(User::class, 'member');
    }
}
