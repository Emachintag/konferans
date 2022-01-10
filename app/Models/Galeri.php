<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'id',
        'title',
        'title_2',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
