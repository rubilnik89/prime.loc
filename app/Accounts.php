<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table = 'accounts';
    protected $fillable = ['number', 'user_id','type_id'];

    public static $accountColumns = [
        "Account"=>"number",
        "Type"=>"type_id",
        "Name"=>"name",
        "Phone"=>"phone",
        "Email"=>"email",

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function users()
    {
        return $this->hasOne('App\User', 'id');
    }
    public function type()
    {
        return $this->hasOne('App\AccountType', 'id');
    }
}