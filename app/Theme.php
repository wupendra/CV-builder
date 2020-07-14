<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $guarded = [];

    //item can be accessed via slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Scope for the active field
    public function scopeActive($query, $value)
    {
        return $query->where('active', $value);
    }
}
