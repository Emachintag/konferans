<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IletisimForm extends Model
{
    use HasFactory;

    protected $table = 'iletisim_form';

    protected $fillable = [
        'id',
        'ad',
        'email',
        'text',
        'created_at',
        'updated_at',
    ];
}
