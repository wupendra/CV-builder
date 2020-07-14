<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    //Language belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
