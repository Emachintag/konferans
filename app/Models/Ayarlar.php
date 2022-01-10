<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayarlar extends Model
{
    use HasFactory;

    protected $table = 'ayarlar';

    protected $fillable = [
        'id',
        'footer_text',
        'footer_hakkimizda',
        'user_id',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
