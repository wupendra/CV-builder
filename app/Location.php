<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    //Location belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
