<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HaberImage extends Model
{
    use HasFactory;

    protected $table = 'haber_gorsel';

    protected $fillable = [
        'id',
        'haber_id',
        'gorsel',

    ];
}
