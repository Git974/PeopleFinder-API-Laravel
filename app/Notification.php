<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $table='tbl_notification';

    protected $fillable = ['user', 'subject', 'message'];

}
