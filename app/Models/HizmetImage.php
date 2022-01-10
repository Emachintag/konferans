<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HizmetImage extends Model
{
    use HasFactory;

    protected $table = 'hizmet_gorsel';

    protected $fillable = [
        'id',
        'blog_id',
        'gorsel',

    ];
}
