<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'keywords' => 'array',
    ];

    //Interest belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
