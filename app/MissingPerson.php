<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MissingPerson extends Model
{
    //
    protected $table='tbl_missing_person';

    protected $fillable = ['firstName', 'lastName', 'age', 'cnic', 'phone', 'address', 'image'];

    public function person_locations(){
        return $this->hasMany('App\PersonLocation', 'missingPerson', 'id');
    }

    public function image(){
        return $this->hasOne('App\Image', 'person', 'id');
    }

    public function search_by_name($name){
        $missingPersons = DB::table('tbl_missing_person')->select('*')->where('firstName', "{$name}")->paginate(10);
        return $missingPersons;
    }

    public function search_by_cnic($cnic){
        $missingPersons = DB::table('tbl_missing_person')->select('*')->where('cnic', "{$cnic}")->get();
        return $missingPersons;
    }

    public function search_by_age($age){
        $missingPersons = DB::table('tbl_missing_person')->select('*')->where('age', "{$age}")->paginate(10);
        return $missingPersons;
    }
}
