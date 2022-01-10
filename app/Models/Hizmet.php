<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hizmet extends Model
{
    use HasFactory;

    protected $table = 'hizmet';

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
