<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        'roles' => 'array',
    ];

    /**

    * @param string|array $roles

    */

    public function authorizeRoles($roles)

    {

      if (is_array($roles)) {
          return $this->hasAnyRole($roles) || 
                 abort(401, 'This action is unauthorized.');
      }

      return $this->hasRole($roles) || 
             abort(401, 'This action is unauthorized.');

    }

    /**

    * Check multiple roles

    * @param array $roles

    */

    public function hasAnyRole($roles)

    {
        $diff = array_diff($this->roles, $roles);
        if($diff !== $this->roles)
            return true;
        return false;

    }

    /**

    * Check one role

    * @param string $role

    */

    public function hasRole($role)

    {

      return in_array($role,$this->roles);

    }

}