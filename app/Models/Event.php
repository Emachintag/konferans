<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'etkinlik';

    protected $fillable = [
        'id',
        'title',
        'website',
        'date',
        'email',
        'country',
        'text',
        'status',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
