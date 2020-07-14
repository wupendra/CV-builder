<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
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

    //Work belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
