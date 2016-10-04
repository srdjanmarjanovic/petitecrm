<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
     * Return sent interactions relationship.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function sentInteractions()
    {
        return $this->morphMany('App\Interaction', 'sender');
    }

    /**
     * Return received interactions relationship.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function receivedInteractions()
    {
        return $this->morphMany('App\Interaction', 'receiver');
    }
}
