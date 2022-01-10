<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosyalMedya extends Model
{
    use HasFactory;

    protected $table = 'sosyal_medya';

    protected $fillable = [
        'id',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'linkedin',
        'created_at',
        'updated_at',
    ];
}
