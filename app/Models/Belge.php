<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belge extends Model
{
    use HasFactory;

    protected $table = 'belge';

    protected $fillable = [
        'id',
        'title',
        'pdf',
        'sira',
        'status',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
