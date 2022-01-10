<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SayfaCategory extends Model
{
    use HasFactory;

    protected $table = 'sayfa_kategori';

    protected $fillable = [
        'id',
        'kategori',
        'kategori_tree',
        'created_at',
        'updated_at',
    ];
}
