<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{
    protected $guarded = [];

    // Cast options JSON to array
    protected $casts = [
        'options' => 'array',
    ];
}
