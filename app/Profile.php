<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    //Profile belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
