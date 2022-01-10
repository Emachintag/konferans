<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haber extends Model
{
    use HasFactory;

    protected $table = 'haber';

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
