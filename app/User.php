<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'country', 'phone', 'is_admin', 'activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function scopeSearchName($query, $name)
    {
        if ($name) $query->where('name', 'like', "%$name%");
    }
    public function scopeSearchSurame($query, $surname)
    {
        if ($surname) $query->where('surname', 'like', "%$surname%");
    }
    public function scopeSearchPhone($query, $phone)
    {
        if ($phone) $query->where('phone', 'like', "%$phone%");
    }
    public function scopeSearchEmail($query, $email)
    {
        if ($email) $query->where('email', 'like', "%$email%");
    }
    public function scopeSearchCountry($query, $country)
    {
        if ($country) $query->where('country', 'like', "%$country%");
    }


}
