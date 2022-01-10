<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sayfa extends Model
{
    use HasFactory;

    protected $table = 'sayfa';

    protected $fillable = [
        'id',
        'title',
        'name',
        'kategori',
        'kategori_tree',
        'sira',
        'url',
        'text',
        'status',
        'type',
        'link',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
