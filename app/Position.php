<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = "positions";
    protected $primaryKey = "pos_id";
    protected $fillable = [
        "pos_name"
    ];

    public static function getPosts(){
        return Position::get();
    }
}
