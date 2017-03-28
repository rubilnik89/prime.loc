<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'account_id_from', 'account_id_to', 'amount', 'type', 'status'];

    public function user()
    {
        return $this->belongsTo('App\models\User');
    }

}

