<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table = 'accounts';
    protected $fillable = ['number', 'user_id','type_id'];

    public function User()
    {
        return $this->hasOne('App\User', 'id');
//        return $this->belongsTo('App\User', 'id');
    }
}