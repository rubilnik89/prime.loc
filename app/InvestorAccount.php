<?php


namespace App;


class InvestorAccount extends Accounts
{
    protected $table = 'accounts';
    protected $fillable = ['number', 'user_id'];

    public function User()
    {
        return $this->belongsTo('App\User', 'id');
    }
}