<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table='tbl_image';

    protected $fillable = ['folder', 'count'];

}
