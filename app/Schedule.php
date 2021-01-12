<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Carbon\Carbon;

class Schedule extends Model
{

    protected $fillable= ['sched_time'];

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }

}
