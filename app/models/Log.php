<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'activity_log';
    public static $columns = [
        "Log name" => "log_name",
        "Description" => "description",
        "Subject Id" => "subject_id",
        "Subject type" => "subject_type",
        "Causer Id" => "causer_id",
        "Causer type" => "causer_type",
        "Created at" => "created_at",
    ];
}
