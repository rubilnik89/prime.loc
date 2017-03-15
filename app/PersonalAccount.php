<?php


namespace App;


class PersonalAccount extends Accounts
{
    protected $table = 'accounts';
    protected $fillable = ['number', 'user_id'];

    public function User()
    {
        return $this->belongsTo('App\User', 'id');
    }
}