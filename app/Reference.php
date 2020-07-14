<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $guarded = [];

    //Reference belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
