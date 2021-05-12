<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShort extends Model
{
    use HasFactory;
    
    protected $table = 'urlshort';

    protected $primaryKey = 'id';

    protected $fillable = [
        'url',
        'short'
    ];
}
