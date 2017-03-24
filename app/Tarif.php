<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{

    protected $fillable = ['title', 'days', 'percent'];

    public function account()
    {
        return $this->hasOne('App\Account');
    }
}
