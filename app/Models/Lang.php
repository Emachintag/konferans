<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;

    protected $table = 'langs';

    protected $fillable = [
        'id',
        'lang',
        'langName',
        'created_at',
        'deleted_at',
    ];
}
