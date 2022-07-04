<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
        'post_id',
    ];

    public function Post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
