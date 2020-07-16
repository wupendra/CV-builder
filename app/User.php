<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //User has many awards
    public function awards()
    {
        return $this->hasMany(Award::class);
    }

    //user has many education
    public function education()
    {
        return $this->hasMany(Education::class);
    }

    //User has many interests
    public function interests()
    {
        return $this->hasMany(Interest::class);
    }

    //User has many languages
    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    //User has one location
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    //User has many profiles
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    //User has many publications
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    //User has many references
    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    //User has many skills
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    //User has many volunteers
    public function volunteer()
    {
        return $this->hasMany(Volunteer::class);
    }

    //User has many works
    public function work()
    {
        return $this->hasMany(Work::class)->orderByRaw("-end_date",'DESC');
    }

    //linked social accounts of the user
    public function accounts(){
        return $this->hasMany('App\LinkedSocialAccount');
    }

    //scope visibility of the user
    public function scopeVisibility($query, $value)
    {
        return $query->where('visibility', $value);
    }
}
