<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    use HasFactory;

    protected $table = 'urun';

    protected $fillable = [
        'id',
        'title',
        'title_2',
        'kategori',
        'sira',
        'text',
        'status',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
