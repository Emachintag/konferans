<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vizyon extends Model
{
    use HasFactory;

    protected $table = 'vizyon';

    protected $fillable = [
        'id',
        'title',
        'text',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
