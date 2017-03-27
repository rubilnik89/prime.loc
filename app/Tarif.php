<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $primaryKey = 'tarifs_id';
    protected $fillable = ['title', 'days', 'percent', 'enabled'];

    public function account()
    {
        return $this->hasOne('App\Account');
    }
}
