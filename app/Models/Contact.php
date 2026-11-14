<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;



class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'alamat',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'no_hp' => 'string',
            'alamat' => 'string',
        ];
    }
    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('site_contact'));
        static::deleted(fn () => Cache::forget('site_contact'));
    }
}
