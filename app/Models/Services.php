<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'judul',
        'sub_judul',
        'judul_deskripsi',
        'deskripsi',
        'judul_point',
        'point',
        'image',
        'content',
    ];

    protected function casts(): array
    {
        return [
            'judul' => 'string',
            'sub_judul' => 'string',
            'judul_deskripsi' => 'string',
            'deskripsi' => 'string',
            'judul_point' => 'string',
            'point' => 'string',
            'image' => 'string',
            'content' => 'array', // Cast JSON to array
        ];
    }
}
