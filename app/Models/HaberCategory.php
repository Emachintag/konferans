<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HaberCategory extends Model
{
    use HasFactory;

    protected $table = 'haber_kategori';

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
