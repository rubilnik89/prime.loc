<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Transaction extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['user_id', 'account_id_from', 'account_id_to', 'amount', 'type', 'status'];


    protected $fillable = ['user_id', 'account_id_from', 'account_id_to', 'amount', 'type', 'status'];


    public function user()
    {
        return $this->belongsTo('App\models\User');
    }

}

