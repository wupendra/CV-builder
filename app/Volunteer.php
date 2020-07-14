<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'start_date','end_date'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'highlights' => 'array',
    ];

    //Volunteer belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
