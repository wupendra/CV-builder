<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'release_date'];

    //Publication belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
