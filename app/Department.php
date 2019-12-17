<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";
    protected $primaryKey = "department_id";
    protected $fillable = [
        "department_name" , "fk_faculty_id"
    ];

    public static function getDepartsById($id){
        return Department::where('fk_faculty_id',$id)->get();
    }
}
