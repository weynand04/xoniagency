<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_h1',
        'main_h2',
        'main_p',
        'main_button_text',
        'main_button_link',
        'sec2_h2',
        'sec2_p',
        'sec2_cards',
        'sec3_h2',
        'sec3_p',
        'sec3_button_text',
        'sec3_button_link',
        'sec4_h2',
        'sec4_p',
        'sec4_button_text',
        'sec4_button_link',
        'sec4_cards',
        'sec5_cards',
        'sec6_h2',
        'sec6_p',
        'sec6_cards',
        'sec7_h2',
        'sec7_p',
        'sec7_button_text',
        'sec7_cards',
        'sec8_h2',
        'sec8_cards',
    ];

    protected $casts = [
        'sec2_cards' => 'array',
        'sec4_cards' => 'array',
        'sec5_cards' => 'array',
        'sec6_cards' => 'array',
        'sec7_cards' => 'array',
        'sec8_cards' => 'array',
    ];
}
