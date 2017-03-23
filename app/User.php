<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public static $columns = [
        "Name" => "name",
        "Surname" => "surname",
        "Email" => "email",
        "Phone" => "phone",
        "Country" => "country",
    ];


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

    public function scopeSearchValue($query, $field, $value)
    {
        if ($value) $query->where($field, 'like', "%$value%");
    }
    public function scopeSearchCountry($query, $country)
    {
        if ($country && $country != '0') $query->where('country', 'like', "%$country%");
    }

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    public function country()
    {
        return $this->hasOne('App\Country', 'country_id', 'country');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
