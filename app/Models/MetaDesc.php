<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaDesc extends Model
{
    use HasFactory;

    protected $table = 'meta_description';

    protected $fillable = [
        'haber',
        'blog',
        'hizmet',
        'urun',
        'referans',
        'belge',
        'ekip',
        'sorular',
        'slider',
        'hakkimizda',
        'ayarlar',
        'vizyon',
        'yorum',
        'iletisim',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
