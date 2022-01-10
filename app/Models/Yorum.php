<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yorum extends Model
{
    use HasFactory;
    protected $table = 'yorum';

    protected $fillable = [
        'id',
        'title',
        'title_2',
        'text',
        'status',
        'image',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
