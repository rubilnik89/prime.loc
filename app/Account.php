<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['number', 'user_id', 'type_id', 'balance', 'tarif_id'];

    public static $accountColumns = [
        "Account" => "number",
        "Type" => "type_id",
        "Balance" => "balance",
        "Name" => "name",
        "Phone" => "phone",
        "Email" => "email",

    ];

    public function scopeSearchValue($query, $field, $value)
    {
        if ($value) $query->where($field, 'like', "%$value%");
    }

    public function scopeSearchBalance($query, $from, $to)
    {
        if ($from && $to) {
            $query->whereBetween('balance', [$from, $to]);
        }else if ($from) {
            $query->where('balance', '>=', $from);
        }else if ($to) {
            $query->where('balance', '<=', $to);
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function account_type()
    {
        return $this->belongsTo('App\AccountType', 'type_id', 'id');
    }

    public function tarif()
    {
        return $this->belongsTo('App\Tarif', 'tarif_id', 'tarifs_id');
    }

}