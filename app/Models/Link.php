<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Link extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function(Link $link) {
            $link->uuid = Str::uuid();
        });
    }

    protected $fillable = [
        'uuid',
        'link',
        'short_name'
    ];

    protected $hidden = [
        'id',
    ];
}
