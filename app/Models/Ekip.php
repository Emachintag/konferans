<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekip extends Model
{
    use HasFactory;

    protected $table = 'ekip';

    protected $fillable = [
        'id',
        'title',
        'title_2',
        'status',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
