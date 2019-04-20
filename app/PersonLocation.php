<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonLocation extends Model
{
    //
    protected $table='tbl_person_location';

    protected $fillable = ['location', 'missingPerson'];

}
