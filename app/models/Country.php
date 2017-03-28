<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    public function user()
    {
        return $this->hasMany('App\models\User');
    }
}