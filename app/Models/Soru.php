<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soru extends Model
{
    use HasFactory;

    protected $table = 'soru';

    protected $fillable = [
        'id',
        'title',
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
