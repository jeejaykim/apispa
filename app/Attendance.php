<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable= [
        'status',
        'date',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function countUser($date){
        return Attendance::where('date',$date)->count();
    }

    public static function getUser($date){
        return Attendance::where('date',$date)->get();
    }
}
