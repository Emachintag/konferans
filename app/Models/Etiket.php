<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiket extends Model
{
    use HasFactory;

    protected $table = 'etiket';

    protected $fillable = [
        'id',
        'title',
        'status',
        'created_at',
        'updated_at',
    ];
}
