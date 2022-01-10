<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referans extends Model
{
    use HasFactory;

    protected $table = 'referans';

    protected $fillable = [
        'id',
        'title',
        'status',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
