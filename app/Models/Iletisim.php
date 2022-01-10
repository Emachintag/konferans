<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iletisim extends Model
{
    use HasFactory;

    protected $table = 'iletisim';

    protected $fillable = [
        'id',
        'tel_1',
        'tel_2',
        'tel_3',
        'email_1',
        'email_2',
        'adres',
        'iframe',
        'lang',
        'lang_id',
        'created_at',
        'updated_at',
    ];
}
