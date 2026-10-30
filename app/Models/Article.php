<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'category',
        'published_at',
        'excerpt',
        'image',
        'content',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date:Y-m-d',
            'content' => 'array',
        ];
    }
}