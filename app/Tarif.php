<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    public static $tarifColumns = [
        "Title" => "title",
        "Days" => "days",
        "Percent" => "percent",
        "Enabled" => "enabled",
    ];
    protected $primaryKey = 'tarifs_id';
    protected $fillable = ['title', 'days', 'percent', 'enabled'];

    public function account()
    {
        return $this->hasOne('App\Account');
    }
}
