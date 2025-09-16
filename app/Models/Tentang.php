<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'tentang';
    protected $fillable = ['key', 'value'];

    protected $casts = [
        'value' => 'array', // otomatis decode JSON ke array
    ];
}
