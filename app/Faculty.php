<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = "faculties";
    protected $primaryKey = "faculty_id";
    protected $fillable = [
        "faculty_name" 
    ];

    public static function getFaculties(){
        return Faculty::get();
    }
}
