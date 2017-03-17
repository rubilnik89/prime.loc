<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['number', 'user_id','type_id'];

    public static $accountColumns = [
        "Account"=>"number",
        "Type"=>"type_id",
        "Name"=>"name",
        "Phone"=>"phone",
        "Email"=>"email",

    ];

    public function scopeSearchNumber($query, $number)
    {
        if ($number) $query->where('number', 'like', "%$number%");
    }
    public function scopeSearchType($query, $type)
    {
        if ($type) $query->where('type_id', 'like', "%$type%");
    }



    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function account_type()
    {
        return $this->belongsTo('App\AccountType','type_id', 'id');
    }

}