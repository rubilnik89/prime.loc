<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $table = 'account_types';
    protected $fillable = ['name', ];

    public function account()
    {
        return $this->belongsTo('App\Accounts', 'type_id');
    }
}