<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesPage extends Model
{
    use HasFactory;

    protected $table = 'services_pages';

    protected $fillable = [
        'hero_h1',
        'hero_h2',
        'hero_p',
        'sec1_h2',
        'sec1_cards',
        'sec2_h2',
        'sec2_p',
        'sec2_cards',
        'sec3_h2',
        'sec3_p',
        'sec3_skills',
    ];

    // Casting JSON biar otomatis array
    protected $casts = [
        'sec1_cards' => 'array',
        'sec2_cards' => 'array',
        'sec3_skills' => 'array',
    ];
}
