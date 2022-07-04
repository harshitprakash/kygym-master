<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $data)
 */
class Post extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable= [
      'member',
      'title',
      'description'
    ];

    /**
     * @return HasOne
     */
    public function Image() {
        return $this->hasOne(PostImages::class, 'post_id');
    }
}
