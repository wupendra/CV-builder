<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'date'];

    //Award belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
