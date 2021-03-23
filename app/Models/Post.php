<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'banner',
        'media1',
        'video',
    ];

    public function tags()
    {
      return $this->belongsToMany(Taggable::class);
    }
}
