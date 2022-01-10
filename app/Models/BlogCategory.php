<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_kategori';

    protected $fillable = [
        'id',
        'kategori',
        'kategori_tree',
        'image',
        'sira',
        'lang',
        'status',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
