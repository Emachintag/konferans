<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;

    protected $table = 'blog_gorsel';

    protected $fillable = [
        'id',
        'blog_id',
        'gorsel',

    ];
}
